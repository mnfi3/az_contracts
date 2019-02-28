<?php

namespace App\Http\Controllers;

use App\Proposal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }


    public function panel(){
      return view('home');
    }


    public function changePassword(Request $request){
      $this->validate($request, [
        'old_pass' => 'required|string|max:250|min:6',
        'new_pass1' => 'required|string|max:250|min:6',
        'new_pass2' => 'required|string|max:250|min:6',
      ]);

      $old = $request->old_pass;
      $new1 = $request->new_pass1;
      $new2 = $request->new_pass2;
      $user = Auth::user();
      if($new1 == $new2){
        if (Hash::check($old, $user->password)){
          $user->password = Hash::make($new1);
          $user->save();
        }
      }
      return redirect(route('home'));
    }


    public function addUser(Request $request){

      $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'pass1' => 'required|string|max:250|min:6',
        'pass2' => 'required|string|max:250|min:6',
      ]);

      if ($request->pass1 == $request->pass2){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
      }

      return redirect(route('home'));
    }


    public function report(){
      $contracts = [];
      $memorandums = [];
      $proposals = [];
      $text = null;
      $category_id = null;
      $from_date = null;
      $to_date = null;
      $from_price = null;
      $to_price = null;

      return view('report', compact(['contracts', 'memorandums', 'proposals',
      'text', 'category_id', 'from_date', 'to_date', 'from_price', 'to_price']));
    }


    public function reportResult(Request $request){
      $text = $request->text;
      $category_id = $request->category_id;
      $from_date = $request->from_date;
      $to_date = $request->to_date;
      $from_price = $request->from_price;
      $to_price = $request->to_price;

      //convert dates
      $date = new PersianDate();
      if($from_date !== null) {
        $from_date = $date->toGregorianDate(PersianNumber::persianToLatin(str_replace(' ','', $from_date)));
      }
      if ($to_date !== null){
        $to_date = $date->toGregorianDate(PersianNumber::persianToLatin(str_replace(' ','', $to_date)));
      }


      $contracts = $this->searchContracts($text, $category_id, $from_date, $to_date, $from_price, $to_price);
      $memorandums = $this->searchMemorandums($text, $category_id, $from_date, $to_date, $from_price, $to_price);
      $proposals = $this->searchProposals($text, $category_id, $from_date, $to_date, $from_price, $to_price);


      return view('report', compact(['contracts', 'memorandums', 'proposals',
        'text', 'category_id', 'from_date', 'to_date', 'from_price', 'to_price']));
    }











    private function searchContracts($text, $category_id, $from_date, $to_date, $from_price, $to_price){
      $contracts = [];
      if($category_id != 1 && $category_id != 2) return $contracts;

      if (!is_null($text)) {
        $contracts1 = DB::select("
          select * from contracts
          where name like '%$text%'
          or ext_no like '%$text%'
          or int_no like '%$text%'
          or type like '%$text%'
          or employer like '%$text%'
          or executer like '%$text%'
          or department like '%$text%'
          or group_name like '%$text%'
          or status like '%$text%'
          or participation like '%$text%' 
          and deleted_at is null");

        $contracts = $this->push($contracts, $contracts1);
      }


      if(!is_null($from_date) && !is_null($to_date)){
        $contracts1 = DB::select("
          select * from contracts
          where start_date between '$from_date' and '$to_date'
          and deleted_at is null");

        $contracts2 = DB::select("
          select * from contracts
          where finish_date between '$from_date' and '$to_date'
          and deleted_at is null");

        $contracts = $this->push($contracts, $contracts1);
        $contracts = $this->push($contracts, $contracts2);
      }


      if(!is_null($from_price) && !is_null($to_price)){
        $contracts1 = DB::select("
          select * from contracts
          where cost between '$from_price' and '$to_price'
          and deleted_at is null");

        $contracts = $this->push($contracts, $contracts1);
      }


      return $contracts;
    }





    private function searchMemorandums($text, $category_id, $from_date, $to_date, $from_price, $to_price){
      $memorandums = [];
      if($category_id != 1 && $category_id != 3) return $memorandums;

      if (!is_null($text)) {
        $memorandums1 = DB::select("
          select * from memoranda
          where title like '%$text%'
          and deleted_at is null");

        $memorandums = $this->push($memorandums, $memorandums1);
      }


      if(!is_null($from_date) && !is_null($to_date)){
        $memorandums1 = DB::select("
          select * from memoranda
          where date BETWEEN '$from_date' and '$to_date'
          and deleted_at is null");

        $memorandums = $this->push($memorandums, $memorandums1);
      }


      return $memorandums;
    }





    private function searchProposals($text, $category_id, $from_date, $to_date, $from_price, $to_price){
      $proposals = [];
      if($category_id != 1 && $category_id != 4) return $proposals;

      if (!is_null($text)) {

        $proposals1 = DB::select(
          "select * from proposals
          where name like '%$text%' 
          or title like '%$text%'
          or department like '%$text%'
          or group_name like '%$text%'
          or employer like '%$text%'
          and deleted_at is null");

        $proposals = $this->push($proposals, $proposals1);
      }

      if(!is_null($from_date) && !is_null($to_date)){
        $proposals1 = DB::select("select * from proposals
        where date BETWEEN '$from_date' and '$to_date'
        and deleted_at is null");
        $proposals = $this->push($proposals, $proposals1);
      }

      return $proposals;
    }



    private function push($baseArray, $subArray){
      foreach ($subArray as $item){
        $baseArray [] = $item;
      }
      return $baseArray;
    }



}

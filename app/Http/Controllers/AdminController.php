<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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






}

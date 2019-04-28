<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Document;
use Illuminate\Http\Request;

class ContractController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }


  public function contracts(){
    $contracts = Contract::orderBy('id', 'desc')->get();
    return view('contracts', compact('contracts'));
  }

  public function addContract(Request $request){
    $this->validate($request, [
      'name' => 'required|string|max:255',
      'ext_no' => 'required|string|max:255',
      'int_no' => 'required|string|max:250',
      'type' => 'required|string|max:250',
      'employer' => 'required|string|max:250',
      'executer' => 'required|string|max:250',
      'partners' => 'required|string|max:250',
      'department' => 'required|string|max:250',
      'group_name' => 'required|string|max:250',
      'start_date' => 'required|string|max:250',
      'duration' => 'required|string|max:250',
      'finish_date' => 'required|string|max:250',
      'status' => 'required|string|max:250',
      'participation' => 'required|string|max:250',
      'cost' => 'required|numeric',
      'pay1' => '',
      'pay2' => '',
      'pay3' => '',
      'pay_final' => '',
    ]);


    $date = new PersianDate();
    $start_date = $date->toGregorianDate(PersianNumber::persianToLatin(str_replace(' ','',$request->start_date)));
    $finish_date = $date->toGregorianDate(PersianNumber::persianToLatin(str_replace(' ','',$request->finish_date)));
    $contract = Contract::create([
      'name' => $request->name,
      'ext_no' => $request->ext_no,
      'int_no' => $request->int_no,
      'type' => $request->type,
      'employer' => $request->employer,
      'partners' => $request->partners,
      'executer' => $request->executer,
      'department' => $request->department,
      'group_name' => $request->group_name,
      'start_date' => $start_date,
      'duration' => $request->duration,
      'finish_date' => $finish_date,
      'status' => $request->status,
      'participation' => $request->participation,
      'cost' => $request->cost,
      'pay1' => $request->pay1,
      'pay2' => $request->pay2,
      'pay3' => $request->pay3,
      'pay_final' => $request->pay_final,
    ]);


    $files = $request->file('documents');
    if($request->hasFile('documents')) {
      foreach ($files as $file) {
        $name = $file->getClientOriginalName();
        $path = $this->upload($file);
        $document = Document::create([
          'name' => $name,
          'documentable_id' => $contract->id,
          'documentable_type' => 'App\Contract',
          'path' => $path,
        ]);
      }
    }

    return redirect(route('contracts'));
  }


  public function contract($id){
    $contract = Contract::find($id);
    return view('contract', compact('contract'));
  }



  public function edit(Request $request){
    $id = $request->id;
    $this->validate($request, [
      'name' => 'required|string|max:255',
      'ext_no' => 'required|string|max:255',
      'int_no' => 'required|string|max:250',
      'type' => 'required|string|max:250',
      'employer' => 'required|string|max:250',
      'executer' => 'required|string|max:250',
      'partners' => 'required|string|max:250',
      'department' => 'required|string|max:250',
      'group_name' => 'required|string|max:250',
      'start_date' => 'required|string|max:250',
      'duration' => 'required|string|max:250',
      'finish_date' => 'required|string|max:250',
      'status' => 'required|string|max:250',
      'participation' => 'required|string|max:250',
      'cost' => 'required|numeric',
      'pay1' => '',
      'pay2' => '',
      'pay3' => '',
      'pay_final' => '',
    ]);

    $date = new PersianDate();
    $start_date = $date->toGregorianDate(PersianNumber::persianToLatin(str_replace(' ','',$request->start_date)));
    $finish_date = $date->toGregorianDate(PersianNumber::persianToLatin(str_replace(' ','',$request->finish_date)));

    $contract = Contract::find($id);
    $contract->name = $request->name;
    $contract->ext_no = $request->ext_no;
    $contract->int_no = $request->int_no;
    $contract->type = $request->type;
    $contract->employer = $request->employer;
    $contract->executer = $request->executer;
    $contract->partners = $request->partners;
    $contract->department = $request->department;
    $contract->group_name = $request->group_name;
    $contract->start_date = $start_date;
    $contract->duration = $request->duration;
    $contract->finish_date = $finish_date;
    $contract->status = $request->status;
    $contract->participation = $request->participation;
    $contract->cost = $request->cost;
    $contract->pay1 = $request->pay1;
    $contract->pay2 = $request->pay2;
    $contract->pay3 = $request->pay3;
    $contract->pay_final = $request->pay_final;
    $contract->save();


    $files = $request->file('documents');
    if($request->hasFile('documents')) {
      foreach ($files as $file) {
        $name = $file->getClientOriginalName();
        $path = $this->upload($file);
        $document = Document::create([
          'name' => $name,
          'documentable_id' => $contract->id,
          'documentable_type' => 'App\Contract',
          'path' => $path,
        ]);
      }
    }

    return redirect(route('contract', $contract->id));

  }


  public function remove(Request $request){
    $id = $request->id;
    $contract = Contract::find($id);
    $docs = $contract->documents;
    foreach ($docs as $doc) {
      $doc->delete();
    }
    $contract->delete();
    return redirect(route('contracts'));
  }




  private function upload($file){
    $file_path = '';
    if ($file !== null) {
      $dir = $this->getFileDirName('files/contracts');
      $name = $file->getClientOriginalName();
      $file_path = $dir . '/' . $name ;
      $file->move($dir, $name);
    }
    return $file_path;
  }

  private function getFileDirName($file_dir){
    date_default_timezone_set('Asia/Tehran');
    $year_dir = date('Y', time());
    $month_dir = date('m', time());
    $file_dir = 'uploads/' . $file_dir . '/' . $year_dir . '/' . $month_dir;
    return $file_dir;
  }
}

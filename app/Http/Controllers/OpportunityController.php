<?php

namespace App\Http\Controllers;

use App\Document;
use App\Opportunity;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }


    public function all(){
      $opportunities = Opportunity::orderBy('id', 'desc')->get();
      return view ('research-opportunities', compact('opportunities'));
    }

    public function item($id){
      $opportunity = Opportunity::find($id);
      return view ('research-opportunity', compact('opportunity'));
    }



    public function add(Request $request){
      $date = new PersianDate();
      $start_date = $date->toGregorianDate(PersianNumber::persianToLatin(str_replace(' ','',$request->start_date)));
      $finish_date = $date->toGregorianDate(PersianNumber::persianToLatin(str_replace(' ','',$request->finish_date)));

      $opportunity = Opportunity::create([
        'executer' => $request->executer,
        'start_date' => $start_date,
        'finish_date' => $finish_date,
        'company' => $request->company,
      ]);

      $files = $request->file('documents');
      if($request->hasFile('documents')) {
        foreach ($files as $file) {
          $name = $file->getClientOriginalName();
          $path = $this->upload($file);
          $document = Document::create([
            'name' => $name,
            'documentable_id' => $opportunity->id,
            'documentable_type' => 'App\Opportunity',
            'path' => $path,
          ]);
        }
      }

      return back();

    }


    public function remove(Request $request){
      $opportunity = Opportunity::find($request->id);
      $opportunity->delete();
      return redirect(route('opportunities'));
    }


    public function update(Request $request){
      $opportunity = Opportunity::find($request->id);

      $date = new PersianDate();
      $start_date = $date->toGregorianDate(PersianNumber::persianToLatin(str_replace(' ','',$request->start_date)));
      $finish_date = $date->toGregorianDate(PersianNumber::persianToLatin(str_replace(' ','',$request->finish_date)));

      $opportunity->executer = $request->executer;
      $opportunity->start_date = $start_date;
      $opportunity->finish_date = $finish_date;
      $opportunity->company = $request->company;
      $opportunity->save();

      $files = $request->file('documents');
      if($request->hasFile('documents')) {
        foreach ($files as $file) {
          $name = $file->getClientOriginalName();
          $path = $this->upload($file);
          $document = Document::create([
            'name' => $name,
            'documentable_id' => $opportunity->id,
            'documentable_type' => 'App\Opportunity',
            'path' => $path,
          ]);
        }
      }

      return back();
    }








  private function upload($file){
    $file_path = '';
    if ($file !== null) {
      $dir = $this->getFileDirName('files/opportunities');
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

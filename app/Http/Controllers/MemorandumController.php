<?php

namespace App\Http\Controllers;

use App\Document;
use App\Memorandum;
use Illuminate\Http\Request;

class MemorandumController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }


    public function memorandums(){
      $memorandums = Memorandum::orderBy('id', 'desc')->get();
      return view('memorandums', compact('memorandums'));
    }

    public function memorandum($id){
      $memorandum = Memorandum::find($id);
      return view('memorandum', compact('memorandum'));
    }


    public function add(Request $request){
      $this->validate($request, [
        'title' => 'required|string|max:255',
        'date' => 'required|string',
        'documents' => 'required',
      ]);

      $date = new PersianDate();
      $date = $date->toGregorianDate(PersianNumber::persianToLatin(str_replace(' ','',$request->date)));

      $memorandum = Memorandum::create([
        'title' => $request->title,
        'date' => $date,
        'organization' => $request->organization,
        'number' => $request->number,
      ]);


      $files = $request->file('documents');
      if($request->hasFile('documents')) {
        foreach ($files as $file) {
          $name = $file->getClientOriginalName();
          $path = $this->upload($file);
          $document = Document::create([
            'name' => $name,
            'documentable_id' => $memorandum->id,
            'documentable_type' => 'App\Memorandum',
            'path' => $path,
          ]);
        }
      }

      return redirect(route('memorandums'));

    }


    public function edit(Request $request){
      $id = $request->id;
      $this->validate($request, [
        'title' => 'required|string|max:255',
        'date' => 'required|string',
      ]);

      $date = new PersianDate();
      $date = $date->toGregorianDate(PersianNumber::persianToLatin(str_replace(' ','',$request->date)));

      $memorandum = Memorandum::find($id);
      $memorandum->title = $request->title;
      $memorandum->date = $date;
      $memorandum->organization = $request->organization;
      $memorandum->number = $request->number;
      $memorandum->save();

      $files = $request->file('documents');
      if($request->hasFile('documents')) {
        foreach ($files as $file) {
          $name = $file->getClientOriginalName();
          $path = $this->upload($file);
          $document = Document::create([
            'name' => $name,
            'documentable_id' => $memorandum->id,
            'documentable_type' => 'App\Memorandum',
            'path' => $path,
          ]);
        }
      }

      return redirect(route('memorandum', $memorandum->id));
    }


    public function remove(Request $request){
      $id = $request->id;
      $memorandum = Memorandum::find($id);
      $docs = $memorandum->documents;
      foreach ($docs as $doc){
        $doc->delete();
      }
      $memorandum->delete();
      return redirect(route('memorandums'));
    }




  private function upload($file){
    $file_path = '';
    if ($file !== null) {
      $dir = $this->getFileDirName('files/memorandums');
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

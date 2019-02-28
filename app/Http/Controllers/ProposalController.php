<?php

namespace App\Http\Controllers;

use App\Document;
use App\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }


    public function proposals(){
      $proposals = Proposal::orderBy('id', 'desc')->get();
      return view('proposals', compact('proposals'));
    }

    public function proposal($id){
      $proposal = Proposal::find($id);
      return view('proposal', compact('proposal'));
    }

    public function add(Request $request){
      $this->validate($request, [
        'name' => 'required|string|max:255',
        'department' => 'required|string|max:255',
        'date' => 'required|string|max:255',
        'group_name' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'employer' => 'required|string|max:255',
      ]);

      $date = new PersianDate();
      $date = $date->toGregorianDate(PersianNumber::persianToLatin(str_replace(' ','',$request->date)));

      $proposal = Proposal::create([
        'name' => $request->name,
        'department' => $request->department,
        'date' => $date,
        'group_name' => $request->group_name,
        'title' => $request->title,
        'employer' => $request->employer,
      ]);

      $files = $request->file('documents');
      if($request->hasFile('documents')) {
        foreach ($files as $file) {
          $name = $file->getClientOriginalName();
          $path = $this->upload($file);
          $document = Document::create([
            'name' => $name,
            'documentable_id' => $proposal->id,
            'documentable_type' => 'App\Proposal',
            'path' => $path,
          ]);
        }
      }

      return redirect(route('proposals'));
    }


    public function edit(Request $request){
      $id = $request->id;
      $this->validate($request, [
        'name' => 'required|string|max:255',
        'department' => 'required|string|max:255',
        'date' => 'required|string|max:255',
        'group_name' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'employer' => 'required|string|max:255',
      ]);

      $date = new PersianDate();
      $date = $date->toGregorianDate(PersianNumber::persianToLatin(str_replace(' ','',$request->date)));

      $proposal = Proposal::find($id);
      $proposal->name = $request->name;
      $proposal->department = $request->department;
      $proposal->date = $date;
      $proposal->group_name = $request->group_name;
      $proposal->title = $request->title;
      $proposal->employer = $request->employer;
      $proposal->save();


      $files = $request->file('documents');
      if($request->hasFile('documents')) {
        foreach ($files as $file) {
          $name = $file->getClientOriginalName();
          $path = $this->upload($file);
          $document = Document::create([
            'name' => $name,
            'documentable_id' => $proposal->id,
            'documentable_type' => 'App\Proposal',
            'path' => $path,
          ]);
        }
      }

      return redirect(route('proposal', $proposal->id));
    }




    public function remove(Request $request){
      $id = $request->id;
      $proposal = Proposal::find($id);
      $docs = $proposal->documents;
      foreach ($docs as $doc){
        $doc->delete();
      }
      $proposal->delete();
      return redirect(route('proposals'));
    }






  private function upload($file){
    $file_path = '';
    if ($file !== null) {
      $dir = $this->getFileDirName('files/proposals');
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

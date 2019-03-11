<?php

namespace App\Http\Controllers;

use App\Document;
use App\Photo;
use App\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function visits(){
    $visits = Visit::orderBy('id', 'desc')->get();
    return view('visits', compact('visits'));
  }

  public function visit($id){
    $visit = Visit::find($id);
    return view('visit', compact('visit'));
  }


  public function add(Request $request){
    $date = new PersianDate();
    $date = $date->toGregorianDate(PersianNumber::persianToLatin(str_replace(' ','',$request->date)));

    $visit = Visit::create([
      'date' => $date,
      'place' => $request->place,
      'organization_boss' => $request->organization_boss,
      'phones' => $request->phones,
      'members' => $request->members,
    ]);

    $files = $request->file('documents');
    if($request->hasFile('documents')) {
      foreach ($files as $file) {
        $name = $file->getClientOriginalName();
        $path = $this->upload($file);
        $document = Document::create([
          'name' => $name,
          'documentable_id' => $visit->id,
          'documentable_type' => 'App\Visit',
          'path' => $path,
        ]);
      }
    }


    $images = $request->file('images');
    if($request->hasFile('images')) {
      foreach ($images as $image) {
        $name = $image->getClientOriginalName();
        $path = $this->upload($image);
        $photo = Photo::create([
          'photoable_id' => $visit->id,
          'photoable_type' => 'App\Visit',
          'path' => $path,
        ]);
      }
    }


    return redirect(route('visits'));
  }


  public function edit(Request $request){
    $id = $request->id;

    $date = new PersianDate();
    $date = $date->toGregorianDate(PersianNumber::persianToLatin(str_replace(' ','',$request->date)));

    $visit = Visit::find($id);
    $visit->date = $date;
    $visit->place = $request->place;
    $visit->organization_boss = $request->organization_boss;
    $visit->phones = $request->phones;
    $visit->members = $request->members;
    $visit->save();


    $files = $request->file('documents');
    if($request->hasFile('documents')) {
      foreach ($files as $file) {
        $name = $file->getClientOriginalName();
        $path = $this->upload($file);
        $document = Document::create([
          'name' => $name,
          'documentable_id' => $visit->id,
          'documentable_type' => 'App\Visit',
          'path' => $path,
        ]);
      }
    }


    $images = $request->file('images');
    if($request->hasFile('images')) {
      foreach ($images as $image) {
        $name = $image->getClientOriginalName();
        $path = $this->upload($image);
        $photo = Photo::create([
          'photoable_id' => $visit->id,
          'photoable_type' => 'App\Visit',
          'path' => $path,
        ]);
      }
    }


    return redirect(route('visit', $id));
  }


  public function remove(Request $request){
    $visit = Visit::find($request->id);
    $visit->delete();

    return redirect(route('visits'));
  }



  private function upload($file){
    $file_path = '';
    if ($file !== null) {
      $dir = $this->getFileDirName('files/visits');
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

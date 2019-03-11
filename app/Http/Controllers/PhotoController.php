<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }


  public function remove(Request $request){
    $id = $request->photo_id;
    $photo = Photo::find($id);
    $photo->delete();
    return back();
  }
}

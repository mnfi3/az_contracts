<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }


    public function remove(Request $request){
      $id = $request->document_id;
      $document = Document::find($id);
      $document->delete();
      return back();
    }
}

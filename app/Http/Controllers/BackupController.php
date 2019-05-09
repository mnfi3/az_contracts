<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(){
    Artisan::call('backup:clean', []);
    Artisan::call('backup:run', []);

    $disk = Storage::disk('local');
    $files = $disk->files('backup');
    $backups = [];
    foreach ($files as $k => $f) {
      // only take the zip files into account
      if (substr($f, -4) == '.zip' && $disk->exists($f)) {
        $backups[] = [
          'file_path' => $f,
          'file_name' => str_replace('backup' . '/', '', $f),
          'file_size' => round(($disk->size($f)/1024)/1024,1) . 'MB',
          'last_modified' => $disk->lastModified($f),
        ];
      }
    }

    $backups = array_reverse($backups);
//    print_r($backups);

    return response()->download(storage_path("app/" . $backups[0]['file_path']));

  }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Memorandum extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'file_path', 'date'];

  public function documents(){
    return $this->morphMany('App\Document', 'documentable');
  }
}

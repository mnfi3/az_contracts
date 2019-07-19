<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opportunity extends Model
{
  use SoftDeletes;

  protected $fillable = ['executer', 'start_date', 'finish_date', 'company'];


  public function documents(){
    return $this->morphMany('App\Document', 'documentable');
  }
}

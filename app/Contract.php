<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'name', 'ext_no', 'int_no', 'type', 'employer', 'executer', 'department',
    'group_name', 'start_date', 'duration', 'finish_date', 'status', 'participation', 'cost'
  ];

  public function documents(){
    return $this->morphMany('App\Document', 'documentable');
  }


}

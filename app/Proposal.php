<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposal extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'title', 'department', 'group_name', 'employer', 'date'];

  public function documents(){
    return $this->morphMany('App\Document', 'documentable');
  }
}

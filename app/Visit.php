<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visit extends Model
{
    use SoftDeletes;

    protected $fillable = ['date', 'place', 'organization_boss', 'phones', 'members'];



    public function documents(){
      return $this->morphMany('App\Document', 'documentable');
    }

    public function photos(){
      return $this->morphMany('App\Photo', 'photoable');
    }
}

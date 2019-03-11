<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
  use SoftDeletes;

  protected $fillable = ['photoable_id', 'photoable_type', 'path'];


}

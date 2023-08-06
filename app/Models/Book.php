<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
class Book extends Model
{
 use HasFactory;
 use SoftDeletes;

 protected $guarded=[];
 public $incrementing=false;

 protected static function boot() {
   parent::boot();
   static::creating(function ($model) {
     $model->id = (string) Str::uuid();
   });


 }
 public function by_user()
 {
  return $this->belongsTo('App\Models\User');
}

public function service()
{
  return $this->belongsTo('App\Models\Service');
}
}

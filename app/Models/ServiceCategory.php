<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
class ServiceCategory extends Model
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
 function parent()
 {
   return $this->belongsTo('App\Models\ServiceCategory','parent_id','id');
 }

 function child()
 {
   return $this->hasMany('App\Models\ServiceCategory','parent_id','id');
 }
}

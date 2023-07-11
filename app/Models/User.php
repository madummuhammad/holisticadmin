<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    protected $guarded=[];
    public $incrementing=false;

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}

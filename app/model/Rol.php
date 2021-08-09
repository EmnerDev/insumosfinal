<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rols';
    protected $fillable = [
        'rol','descripcion',
    ];
    public function users() {
        return $this->belongstoMany(User::class, 'user_rols');
    }
}

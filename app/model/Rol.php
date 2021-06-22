<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rols';
    protected $fillable = [
        'rol','descripcion',
    ];
    public function userrol() {
        return $this->belongstoMany(UserRol::class);
    }
}

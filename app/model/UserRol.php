<?php

namespace App\model;


use Illuminate\Database\Eloquent\Model;

class UserRol extends Model
{
    protected $table = 'user_rols';
    protected $fillable = [
        'rol_id','user_id'
    ];
    public function rol() {
        return $this->belongsto(Rol::class);
    }
    public function user() {
        return $this->belongsto(User::class);
}
}
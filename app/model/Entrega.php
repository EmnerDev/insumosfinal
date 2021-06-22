<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $table = 'entregas';
    protected $fillable = [
        'user_id','fecha','descripcion'
    ];
    public function user() {
        return $this->belongsto(User::class);
    }
    public function pivotentregasalida() {
        return $this->belongstoMany(PivotEntregaSalida::class);
    }
}

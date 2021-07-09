<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PivotEntregaSalida extends Model
{
    protected $table = 'pivot_entrega_salidas';
    protected $fillable = [
        'entrega_id','salida_id'
    ];
    public function entrega() {
        return $this->belongsto(Entrega::class,'entrega_id','id');
    }
    public function salidaproducto() {
        return $this->belongsto(SalidaProducto::class,'salida_id','id');
    }
}

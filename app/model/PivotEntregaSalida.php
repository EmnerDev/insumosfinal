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
        return $this->belongstoMany(Entrega::class);
    }
    public function salidaproductos() {
        return $this->belongstoMany(SalidaProducto::class);
    }
}

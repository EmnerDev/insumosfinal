<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [
        'presentacion_id','nombre','descripcion','cantidad'
    ];

    public function presentacion() {
        return $this->belongsto(Presentacion::class);
    }
    public function salidaproductos() {
        return $this->belongstoMany(SalidaProducto::class);
    }
    public function ingresoproductos() {
        return $this->belongstoMany(IngresoProducto::class);
    }
}

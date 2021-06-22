<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class SalidaProducto extends Model
{
    protected $table = 'salida_productos';
    protected $fillable = [
        'producto_id','descripcion','cantidad'
    ];
    public function producto() {
        return $this->belongsto(Producto::class);
    }
    public function pivotentregasalidas() {
        return $this->belongstoMany(PivotEntregaSalida::class);
    }
}

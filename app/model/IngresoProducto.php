<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class IngresoProducto extends Model
{
    protected $table = 'ingreso_productos';
    protected $fillable = [
        'producto_id','descripcion','cantidad'
    ];
    public function producto() {
        return $this->belongsto(Producto::class);
    }
}

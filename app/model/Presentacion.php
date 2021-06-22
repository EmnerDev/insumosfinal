<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    protected $table = 'presentacions';
    protected $fillable = [
        'nombre'
    ];
    public function producto() {
        return $this->belongstoMany(Producto::class);
    }
}

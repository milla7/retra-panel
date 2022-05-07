<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoFotos extends Model
{
    protected $table = 'fotos_producto';
    protected $guarded = [];
    public $timestamps = false;
     public function productoOrden(){
    	return $this->belongsTo('App\ProductoOrden', 'id_producto_orden');
    }
}

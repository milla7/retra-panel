<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'orden';
    protected $guarded = [];
    public $timestamps = false;

    public function productos(){
        return $this->hasMany('App\ProductoOrden', 'id_orden');
    }

    public function estatus(){
    	return $this->belongsTo('App\EstatusOrden', 'id_estatus');
    }
    public function cliente(){
    	return $this->belongsTo('App\Cliente', 'id_usuario');
    }
    public function pago(){
        return $this->hasOne('App\Pago', 'id_orden');
    }

    public function direccion(){
        return $this->belongsTo('App\DireccionEnvio', 'id_direccion');
    }
}

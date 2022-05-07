<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Cliente extends Model
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public $timestamps = false;

    public function ordenes(){
        return $this->hasMany('App\Orden', 'id_usuario');
    }
}

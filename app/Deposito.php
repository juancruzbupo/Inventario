<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    protected $table = 'depositos';
    public $timestamps = true;
    protected $fillable = array('nombre', 'agente_id', 'dependencia_id');
	protected $visible = array('id', 'nombre', 'agente_id', 'dependencia_id');

	public function agente() {
		return $this->belongsTo('App\Agente', 'agente_id');
	}

	public function dependencia() {
		return $this->belongsTo('App\Dependencia', 'dependencia_id');
	}

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model {

	protected $table = 'dependencias';
	public $timestamps = true;
	protected $fillable = array('nombre', 'es_int');
	protected $visible = array('id', 'nombre', 'es_int');

	public function deposito() {
		return $this->hasMany('App\Deposito');
	}

	public function agente() {
		return $this->hasMany('App\Agente');
	}

	public function scopeLista($query) {
		return $query->select('id', 'nombre')->where('es_int','si');
	}

}
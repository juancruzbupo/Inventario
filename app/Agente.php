<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Agente extends Model {

	protected $table = 'agentes';
	public $timestamps = true;
	protected $fillable = array('legajo' ,'apellido', 'nombre', 'dni', 'dependencia_id');
	protected $visible = array('id', 'legajo', 'apellido', 'nombre', 'dni', 'dependencia_id');

	public function producto() {
		return $this->hasMany('App\Producto');
	}

	public function dependencia() {
		return $this->belongsTo('App\Dependencia', 'dependencia_id');
	}

	public function scopeLista($query) {
		return $query->select('id', 'legajo', 'apellido', 'nombre', 'dependencia_id');
	}
	
}
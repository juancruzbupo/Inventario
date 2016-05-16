<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model {
 
	protected $table = 'transferencias';
	public $timestamps = true;
	protected $fillable = array('fecha', 'monto', 'codigo', 'fecha_baja', 'agente_id', 'dependencia_id', 'deposito_id');
	protected $visible = array('id', 'fecha', 'monto', 'codigo', 'fecha_baja', 'agente_id', 'dependencia_id', 'deposito_id');

	public function agente() {
		return $this->belongsTo('App\Agente', 'agente_id');
	}

	public function dependencia() {
		return $this->belongsTo('App\Dependencia', 'dependencia_id');
	}

	public function deposito() {
		return $this->belongsTo('App\Deposito', 'deposito_id');
	}

	public function producto() {
		return $this->belongsToMany('App\Producto');
	}

	public function scopeDatatables($query) {
		return $query->select('id', 'codigo', 'fecha', 'agente_id', 'dependencia_id','deposito_id');
	}

}
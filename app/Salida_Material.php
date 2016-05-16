<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida_Material extends Model
{
	protected $table = 'salida_materiales';
	public $timestamps = true;
	protected $fillable = array('fecha', 'monto', 'fecha_baja', 'agente_id', 'dependencia_id', 'deposito_id', 'producto_id');
	protected $visible = array('id', 'fecha', 'monto', 'fecha_baja', 'agente_id', 'dependencia_id', 'deposito_id', 'producto_id');

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
		return $this->belongsTo('App\Producto', 'producto_id');
	}

	public function productos() {
		return $this->belongsToMany('App\Producto');
	}

	public function scopeDatatables($query) {
		return $query->select('id', 'fecha', 'agente_id', 'dependencia_id','deposito_id','producto_id');
	}

}

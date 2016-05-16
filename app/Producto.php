<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {

	protected $table = 'productos';
	public $timestamps = true;
	protected $fillable = array('marca_id', 'modelo_id', 'nro_serie', 'id_patrimonial', 'fecha_alta', 'fecha_baja', 'subcuenta_id', 'carga_id', 'detalle', 'importe', 'nombre', 'cod_destino', 'tip_destino');
	protected $visible = array('id', 'marca_id', 'modelo_id', 'nro_serie', 'id_patrimonial', 'fecha_alta', 'fecha_baja', 'subcuenta_id', 'carga_id', 'detalle', 'importe', 'nombre', 'cod_destino', 'tip_destino');

	public function carga() {
		return $this->belongsTo('App\Carga', 'carga_id');
	}

	public function marca() {
		return $this->belongsTo('App\Marca', 'marca_id');
	}

	public function modelo() {
		return $this->belongsTo('App\Modelo', 'modelo_id');
	}

	public function subcuenta() {
		return $this->belongsTo('App\SubCuenta', 'subcuenta_id');
	}

	public function transferencia() {
		return $this->belongsToMany('App\Transferencia');
	}

	public function salida_material() {
		return $this->belongsToMany('App\Salida_Material');
	}

	public function scopeDatatables($query,$id) {
		return $query->where(array('subcuenta_id' => $id , 'tip_destino' => '1'));
	}

	public function scopeDatatablestransf($query) {
		return $query->select('id', 'nombre', 'nro_serie', 'id_patrimonial', 'detalle', 'cod_destino', 'tip_destino');
	}

	public function scopeDatatablessal($query) {
		return $query->select('id', 'nombre', 'nro_serie', 'id_patrimonial', 'detalle', 'cod_destino', 'tip_destino');
	}

	public function scopeCargode($query,$id) {
		return $query->where(array('tip_destino' => '3' , 'cod_destino' => $id));
	}

}
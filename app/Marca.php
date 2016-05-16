<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model {

	protected $table = 'marcas';
	public $timestamps = true;
	protected $fillable = array('nombre');
	protected $visible = array('nombre');

}
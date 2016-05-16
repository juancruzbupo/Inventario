<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Destino extends Model
{
	protected $table = 'tipo_destinos';
	public $timestamps = true;
	protected $fillable = array('nombre');
	protected $visible = array('id', 'nombre');
}

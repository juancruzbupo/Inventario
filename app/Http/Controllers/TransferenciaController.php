<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Transferencia;
use App\Agente;
use App\Producto;
use Datatables;
use Carbon\Carbon;
use App\Dependencia;
use App\Deposito;
use Illuminate\Http\Request;

class TransferenciaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$transferencias = Transferencia::latest()->get();
		return view('transferencia.index', compact('transferencias'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		
		$agentes = Agente::Lista()->get();

		$agente = array('' => 'Seleccionar...');

		foreach ($agentes as $var) { //creo lista de agentes
			$agente = $agente + array($var->id => $var->legajo. ' - ' . $var->apellido . ' ' . $var->nombre );
		}
		
		$dependencias = Dependencia::Lista()->get();

		$dependencia = array('' => 'Seleccionar...');

		foreach ($dependencias as $var) { //creo lista de dependencias internas
			$dependencia = $dependencia + array($var->id => $var->nombre);
		}		

		$deposito = Deposito::lists('nombre', 'id')->all();
		
		$deposito = array('' => 'Seleccionar...') + $deposito;
		
		return view('transferencia.create', compact('agente', 'dependencia','deposito'));
	} 

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {
				
		$transferencia = new Transferencia;

		$transferencia->codigo = $request['codigo'];

		$transferencia->fecha = $request['fecha'];

		if($request['tip_destino'] == 3){ //tipo 3 agente
			$transferencia->agente_id = $request['seleccion_id'];
		}

		if($request['tip_destino'] == 2){ // tipo 2 deposito
			$transferencia->dependencia_id = $request['seleccion_id'];
		}

		if($request['tip_destino'] == 1){ // tipo 2 deposito
			$transferencia->deposito_id = $request['seleccion_id'];
		}		

		$transferencia->save();

		foreach ($request['id'] as $id) {

			$producto = Producto::findOrFail($id);

			$producto->tip_destino = $request['tip_destino'];

			$producto->cod_destino = $request['seleccion_id'];

			$producto->save();

			$transferencia->producto()->attach($id);

		}

		return redirect('transferencia');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$transferencia = Transferencia::findOrFail($id);
		return view('transferencia.show', compact('transferencia'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$transferencia = Transferencia::findOrFail($id);
		return view('transferencia.edit', compact('transferencia'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request) {
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if needed.
		$transferencia = Transferencia::findOrFail($id);
		$transferencia->update($request->all());
		return redirect('transferencia');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {

		$transferencia = Transferencia::findOrFail($id);

		$transferencia->producto()->detach();

		$transferencia->delete();

		return redirect('transferencia');
	}

	public function datatables() {

		$datas = Producto::Datatablestransf()->get();

		$data = $this->listProduc($datas);

		return Datatables::of(collect($data))
			->make(true);

	}

	public function indextables() {

		$datas = Transferencia::Datatables()->get();

		$data = $this->lisTransf($datas);

		return Datatables::of(collect($data))//pasa el dato como collecion collect()
			->editColumn('codigo', function ($data) {
			 	return '<a href="transferencia/'.$data['id'].'" >'. $data['codigo'].'</a>';
			})
			->addColumn('action', function ($data) {
	                return '<a href="transferencia/'.$data['id'].'/edit" class="btn btn-xs btn-primary">Edit</a>' . ' / <form method="POST" action="http://localhost/inventario/transferencia/ ' .$data['id']. '" accept-charset="UTF-8" style="display:inline"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="'. csrf_token() .'"><button type="submit" class="btn btn-danger btn-xs">Borrar</button></form>';
            })
			->make(true);
	}

	public function validarCodigo(Request $request){

		if ($request->ajax()) {
			$repite = 0;
			
			$repite = Transferencia::where('codigo', $request->codigo)->count();	
			
			return response()->json(['repetido' => $repite]);

		}
	}

	private function lisTransf($datas){

		$data = [];

		$destino = null;		

		foreach ($datas as $value) {
			if($value->agente != null){
				$destino = $value->agente->apellido . " " . $value->agente->nombre;
			}else{
				if($value->dependencia != null){
					$destino = $value->dependencia->nombre;
				}else{
					if($value->deposito != null){
						$destino = $value->deposito->nombre;
					}	
				}
			}
			
			array_push($data, array('id' => $value->id, 'codigo' => $value->codigo, 'fecha' => Carbon::createFromFormat('Y-m-d', $value->fecha)->format('d/m/Y'), 'destino' => $destino));
			
		}

		return $data;

	}

	private function listProduc($datas){
		$data = [];

		$ubicacion = null;

		foreach ($datas as $value) {
			if($value->tip_destino == 1){
				$deposito = Deposito::findOrFail($value->cod_destino);
				$ubicacion = $deposito->nombre; 				
			}else{
				if($value->tip_destino == 2){
					$dependencia = Dependencia::findOrFail($value->cod_destino);
					$ubicacion = $dependencia->nombre;
				}else{
					if($value->tip_destino == 3){
						$agente = Agente::findOrFail($value->cod_destino);
						$ubicacion = $agente->apellido . ' ' . $agente->nombre;	
					}
				}
			}

			array_push($data, array('id' => $value->id, 'nombre' => $value->nombre, 'nro_serie' => $value->nro_serie, 'id_patrimonial' => $value->id_patrimonial, 'ubicacion' => $ubicacion, 'detalle' => $value->detalle));

		}

		return $data;
	}

}

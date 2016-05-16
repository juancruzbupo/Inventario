<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salida_Material;
use App\Agente;
use App\Producto;
use Datatables;
use Carbon\Carbon;
use App\Dependencia;
use App\Deposito;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SalidaMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiales = Salida_Material::latest()->get();
        return view('salida_material.index', compact('materiales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $agentes = Agente::Lista()->get();

        $agente = array('' => 'Seleccionar...');

        foreach ($agentes as $var) { //creo lista de agentes
            $agente = $agente + array($var->id => $var->legajo. ' - ' . $var->apellido . ' ' . $var->nombre );
        }   

        $deposito = Deposito::lists('nombre', 'id')->all();
        
        $deposito = array('' => 'Seleccionar...') + $deposito;

        $producto = Producto::lists('nombre', 'id')->all();
        
        $producto = array('' => 'Seleccionar...') + $producto;
        
        return view('salida_material.create', compact('agente', 'dependencia','deposito','producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salida = new Salida_Material;

        $salida->fecha = $request['fecha'];

        if($request['tip_destino'] == 4){ //tipo 4 producto
            $salida->producto_id = $request['seleccion_id'];
        }else{
            if($request['tip_destino'] == 3){ //tipo 3 agente
            $salida->agente_id = $request['seleccion_id'];
            }else{
                if($request['tip_destino'] == 1){ // tipo 2 deposito
                    $salida->deposito_id = $request['seleccion_id'];
                }        
            }    
        }      

        $salida->save();

        foreach ($request['id'] as $id) {

            $producto = Producto::findOrFail($id);

            $producto->tip_destino = $request['tip_destino'];

            $producto->cod_destino = $request['seleccion_id'];

            $producto->save();

            $salida->productos()->attach($id);

        }

        return redirect('salida_material');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salida = Salida_Material::findOrFail($id);
        return view('salida_material.show', compact('salida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function datatables() {

        $datas = Producto::Datatablessal()->get();

        $data = $this->listProduc($datas);

        return Datatables::of(collect($data))
            ->make(true);

    }

    public function indextables() {

        $datas = Salida_Material::Datatables()->get();

        $data = $this->lisSalida($datas);

        return Datatables::of(collect($data))//pasa el dato como collecion collect()
            ->editColumn('codigo', function ($data) {
                return '<a href="salida_material/'.$data['id'].'" >'. $data['id'].'</a>';
            })
            ->addColumn('action', function ($data) {
                    return '<a href="salida_material/'.$data['id'].'/edit" class="btn btn-xs btn-primary">Edit</a>' . ' / <form method="POST" action="http://localhost/inventario/salida_material/ ' .$data['id']. '" accept-charset="UTF-8" style="display:inline"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="'. csrf_token() .'"><button type="submit" class="btn btn-danger btn-xs">Borrar</button></form>';
            })
            ->make(true);
    }

    private function lisSalida($datas){

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
                    }else{
                        if($value->producto != null){
                            $destino = $value->producto->nombre;
                        }   
                    }   
                }
            }
            
            array_push($data, array('id' => $value->id, 'fecha' => Carbon::createFromFormat('Y-m-d', $value->fecha)->format('d/m/Y'), 'destino' => $destino));
            
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
                    }else{
                        $producto = Producto::findOrFail($value->cod_destino);
                        $ubicacion = $producto->nombre;
                    }
                }
            }

            array_push($data, array('id' => $value->id, 'nombre' => $value->nombre, 'nro_serie' => $value->nro_serie, 'id_patrimonial' => $value->id_patrimonial, 'ubicacion' => $ubicacion, 'detalle' => $value->detalle));

        }

        return $data;
    }

}

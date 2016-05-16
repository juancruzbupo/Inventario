<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tipo_Destino;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TipoDestinoController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tipo_destinos = Tipo_Destino::latest()->get();
		return view('tipo_destino.index', compact('tipo_destinos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tipo_destino.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if you need to validate any input.
		Tipo_Destino::create($request->all());
		return redirect('tipo_destino');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tipo_destino = Tipo_Destino::findOrFail($id);
		return view('tipo_destino.show', compact('tipo_destino'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tipo_destino = Tipo_Destino::findOrFail($id);
		return view('tipo_destino.edit', compact('tipo_destino'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if you need to validate any input.
		$tipo_destino = Tipo_Destino::findOrFail($id);
		$tipo_destino->update($request->all());
		return redirect('tipo_destino');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Tipo_Destino::destroy($id);
		return redirect('tipo_destino');
	}

}

<?php

namespace App\Http\Controllers;

use App\Dependencia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DependenciaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$dependencias = Dependencia::latest()->get();
		return view('dependencia.index', compact('dependencias'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view('dependencia.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if needed.
		Dependencia::create($request->all());
		return redirect('dependencia');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$dependencium = Dependencia::findOrFail($id);
		return view('dependencia.show', compact('dependencium'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$dependencium = Dependencia::findOrFail($id);
		return view('dependencia.edit', compact('dependencium'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request) {
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if needed.
		$dependencium = Dependencia::findOrFail($id);
		$dependencium->update($request->all());
		return redirect('dependencia');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Dependencia::destroy($id);
		return redirect('dependencia');
	}

}

<?php

namespace App\Http\Controllers;

use App\Cuenta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CuentaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$cuentas = Cuenta::latest()->get();
		return view('cuenta.index', compact('cuentas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view('cuenta.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if needed.
		Cuenta::create($request->all());
		return redirect('cuenta');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$cuentum = Cuenta::findOrFail($id);
		return view('cuenta.show', compact('cuentum'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$cuentum = Cuenta::findOrFail($id);
		return view('cuenta.edit', compact('cuentum'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request) {
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if needed.
		$cuentum = Cuenta::findOrFail($id);
		$cuentum->update($request->all());
		return redirect('cuenta');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		Cuenta::destroy($id);
		return redirect('cuenta');
	}

}

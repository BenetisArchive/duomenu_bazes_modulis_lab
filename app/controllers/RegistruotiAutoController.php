<?php

App::bind('RegistruotasAuto', 'RegistruotasAuto');

class RegistruotiAutoController extends \BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$registruoti_auto = RegistruotasAuto::all();
		return View::make("registruoti_auto.index")
					->with("registruoti_auto", $registruoti_auto);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$automodeliai = Automodelis::lists("modelis", "id");
		$savininkai = Savininkas::lists("asmens_kodas", "id");

		return View::make('registruoti_auto.create')
					->with("automodeliai", $automodeliai)
					->with("savininkai", $savininkai);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), RegistruotasAuto::$rules);

		if ($validator->fails()) {
			return Redirect::to('registruoti_auto/create')
				->withErrors($validator);
		} else {
			$registruotas_auto = new RegistruotasAuto;
			$registruotas_auto->modelio_id = Input::get('automodelis');
			$registruotas_auto->savininko_id = Input::get('savininkas');
			$registruotas_auto->valst_nr = Input::get('valst_nr');
			$registruotas_auto->kebulo_nr = Input::get('kebulo_nr');
			$registruotas_auto->iregistruota = Input::get('iregistruota');
			$registruotas_auto->auto_rusis = Input::get('auto_rusis');
			$registruotas_auto->save();

			// redirect
			Session::flash('message', 'Sekmingai uzregistruotas automobilis');
			return Redirect::to('registruoti_auto');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$automodeliai = Automodelis::lists("modelis", "id");
		$savininkai = Savininkas::lists("asmens_kodas", "id");
		$registruoti_auto = RegistruotasAuto::all()->find($id);
		return View::make("registruoti_auto.show")
					->with("registruoti_auto", $registruoti_auto)
					->with("automodeliai", $automodeliai)
					->with("savininkai", $savininkai);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$automodeliai = Automodelis::lists("modelis", "id");
		$savininkai = Savininkas::lists("asmens_kodas", "id");
		$registruoti_auto = RegistruotasAuto::all()->find($id);
		return View::make("registruoti_auto.edit")
					->with("registruoti_auto", $registruoti_auto)
					->with("automodeliai", $automodeliai)
					->with("savininkai", $savininkai);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), RegistruotasAuto::$rules);

		if ($validator->fails()) {
			return Redirect::to("registruoti_auto/{$id}/edit")
				->withErrors($validator);
		} else {
			$registruotas_auto = RegistruotasAuto::find($id);
			$registruotas_auto->modelio_id = Input::get('automodelis');
			$registruotas_auto->savininko_id = Input::get('savininkas');
			$registruotas_auto->valst_nr = Input::get('valst_nr');
			$registruotas_auto->kebulo_nr = Input::get('kebulo_nr');
			$registruotas_auto->iregistruota = Input::get('iregistruota');
			$registruotas_auto->auto_rusis = Input::get('auto_rusis');
			$registruotas_auto->save();

			// redirect
			Session::flash('message', 'Sekmingai issaugotas automobilis');
			return Redirect::to('registruoti_auto');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$registruotas_auto = RegistruotasAuto::find($id);
		$registruotas_auto->delete();

		Session::flash('message', 'Sekmingai istrintas registruotas auto');
		return Redirect::to('registruoti_auto');
	}

}
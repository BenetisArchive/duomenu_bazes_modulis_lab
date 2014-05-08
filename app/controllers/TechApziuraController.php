<?php

class TechApziuraController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tech_apziura = TechApziura::all();
		return View::make("tech_apziura.index")
			->with("tech_apziura", $tech_apziura);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$registruoti_auto = RegistruotasAuto::lists('valst_nr', 'id');
		return View::make("tech_apziura.create")
			->with("registruoti_auto", $registruoti_auto);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = $this->getRules();
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('tech_apziura/create')
				->withErrors($validator);
		} else {
			$tech_apziura = new TechApziura;
			$tech_apziura->tech_apziuros_data = Input::get('tech_apziuros_data');
			$tech_apziura->komentarai = Input::get('komentarai');
			$tech_apziura->atlikta = Input::get('atlikta');
			$tech_apziura->tech_apziura_galioja_iki = Input::get('tech_apziura_galioja_iki');
			$tech_apziura->auto_id = Input::get('automobilis');
			$tech_apziura->save();

			// redirect
			Session::flash('message', 'Sekmingai atlikta tech apziura');
			return Redirect::to('tech_apziura');
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
		$registruoti_auto = RegistruotasAuto::lists('valst_nr', 'id');
		$tech_apziura = TechApziura::find($id);
		$savininkas = $tech_apziura->auto->savininkas;
		$auto = $tech_apziura->auto;
		return View::make("tech_apziura.show")
			->with("registruoti_auto", $registruoti_auto)
			->with("tech_apziura", $tech_apziura)
			->with('savininkas', $savininkas)
			->with('auto', $auto);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$registruoti_auto = RegistruotasAuto::lists('valst_nr', 'id');
		$tech_apziura = TechApziura::find($id);
		return View::make("tech_apziura.edit")
			->with("registruoti_auto", $registruoti_auto)
			->with("tech_apziura", $tech_apziura);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = $this->getRules();
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to("tech_apziura/{$id}/edit")
				->withErrors($validator);
		} else {
			$tech_apziura = TechApziura::find($id);
			$tech_apziura->tech_apziuros_data = Input::get('tech_apziuros_data');
			$tech_apziura->komentarai = Input::get('komentarai');
			$tech_apziura->atlikta = Input::get('atlikta');
			$tech_apziura->tech_apziura_galioja_iki = Input::get('tech_apziura_galioja_iki');
			$tech_apziura->auto_id = Input::get('automobilis');
			$tech_apziura->save();

			// redirect
			Session::flash('message', 'Sekmingai issaugota tech apziura');
			return Redirect::to('tech_apziura');
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
		$tech_apziura = TechApziura::find($id);
		$tech_apziura->delete();

		Session::flash('message', 'Sekmingai istrinta tech apziura');
		return Redirect::to('tech_apziura');
	}

		public function getRules()
	{
		return array(
			'tech_apziuros_data'=> 'required',
			'komentarai'=> 'required',
			'automobilis'=> 'required',
			'tech_apziura_galioja_iki'=> 'required',
		);
	}

}
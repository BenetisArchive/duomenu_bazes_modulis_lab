<?php

class SavininkaiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$savininkai = Savininkas::all();
		return View::make("savininkai.index")
				->with("savininkai", $savininkai);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("savininkai.create");
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

		if($validator->fails()) {
			return Redirect::to("savininkai/create")
					->withErrors($validator)
					->withInput(); //Input::except('password')

		} else {
			$savininkas = new Savininkas;
			$savininkas->vardas = Input::get("vardas");
			$savininkas->pavarde = Input::get("pavarde");
			$savininkas->asmens_kodas = Input::get("asmens_kodas");
			$savininkas->lytis	= Input::get("lytis");

			$savininkas->save();
			Session::flash('message', 'Sekmingai sukurtas savininkas');
			return Redirect::to("savininkai");
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
		$savininkas = Savininkas::find($id);
		return View::make("savininkai.show")
					->with("savininkas", $savininkas);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$savininkas = Savininkas::find($id);
		return View::make("savininkai.edit")
					->with("savininkas", $savininkas);
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
			return Redirect::to('savininkai/' . $id . '/edit')
				->withErrors($validator)
				->withInput();
		} else {
			// store
			$savininkas = Savininkas::find($id);
			$savininkas->vardas = Input::get("vardas");
			$savininkas->pavarde = Input::get("pavarde");
			$savininkas->asmens_kodas = Input::get("asmens_kodas");
			$savininkas->lytis	= Input::get("lytis");
			$savininkas->save();

			Session::flash('message', 'Sekmingai issaugotas savininkas');
			return Redirect::to('savininkai');
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
		$savininkas = Savininkas::find($id);
		$savininkas->delete();

		Session::flash('message', 'Sekmingai istrintas savininkas');
		return Redirect::to('savininkai');
	}

	public function getRules()
	{
		return array(
			'vardas' =>'required',
			'pavarde' =>'required',
			'asmens_kodas' =>'required|numeric|min:11|',
			'lytis' =>'required',
		);
	}

}
<?php

class AutomodeliaiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$automodeliai = Automodelis::all();
		return View::make("automodeliai.index")
				->with("automodeliai", $automodeliai);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$gamintojai = Gamintojas::lists("pavadinimas", "id");
		return View::make("automodeliai.create")
				->with("gamintojai", $gamintojai);
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
			return Redirect::to('automodeliai/create')
				->withErrors($validator);
		} else {

			$automodelis = new Automodelis;
			$automodelis->modelis       = Input::get('modelis');
			$automodelis->gamintojo_id  = Input::get('gamintojas');
			$automodelis->save();

			// redirect
			Session::flash('message', 'Sekmingai sukurtas automodelis');
			return Redirect::to('automodeliai');
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
        $gamintojai = Gamintojas::lists("pavadinimas", "id");
        $automodeliai = Automodelis::find($id);
        return View::make("automodeliai.show")
            ->with("gamintojai", $gamintojai)
            ->with("automodeliai", $automodeliai);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$gamintojai = Gamintojas::lists("pavadinimas", "id");
		$automodeliai = Automodelis::find($id);
		return View::make("automodeliai.edit")
					->with("gamintojai", $gamintojai)
					->with("automodeliai", $automodeliai);
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
			return Redirect::to('automodeliai/' . $id . '/edit')
				->withErrors($validator)
				->withInput();
		} else {
			// store
			$automodelis = Automodelis::find($id);
			$automodelis->modelis = Input::get("modelis");
			$automodelis->gamintojo_id = Input::get("gamintojas");
			$automodelis->save();

			Session::flash('message', 'Sekmingai issaugotas automodelis');
			return Redirect::to('automodeliai');
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
		$automodelis = Automodelis::find($id);
		$automodelis->delete();

		Session::flash('message', 'Sekmingai istrintas automodelis');
		return Redirect::to('automodeliai');
	}

	public function getRules()
	{
		return array(
			'modelis'=> 'required',
			'gamintojas'=> 'required',
		);
	}

}
<?php

class GamintojaiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$gamintojai = Gamintojas::all();

		return View::make("gamintojai.index")
			->with("gamintojai", $gamintojai);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('gamintojai.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = $this->getRules();
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('gamintojai/create')
				->withErrors($validator);
		} else {
			$gamintojas = new Gamintojas;
			$gamintojas->pavadinimas       = Input::get('pavadinimas');
			$gamintojas->save();

			// redirect
			Session::flash('message', 'Sekmingai sukurtas gamintojas');
			return Redirect::to('gamintojai');
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
		$gamintojas = Gamintojas::find($id);
		return View::make("gamintojai.show")
					->with("gamintojas", $gamintojas);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$gamintojas = Gamintojas::find($id);
		return View::make("gamintojai.edit")
					->with("gamintojas", $gamintojas);
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
			return Redirect::to('gamintojai/' . $id . '/edit')
				->withErrors($validator)
				->withInput();
		} else {
			// store
			$gamintojas = Gamintojas::find($id);
			$gamintojas->pavadinimas = Input::get("pavadinimas");
			$gamintojas->save();

			Session::flash('message', 'Sekmingai issaugotas gamintojas');
			return Redirect::to('gamintojai');
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
		$gamintojas = Gamintojas::find($id);
		$gamintojas->delete();

		Session::flash('message', 'Sekmingai istrintas gamintojas');
		return Redirect::to('gamintojai');
	}

	public function getRules()
	{
		return array(
			'pavadinimas'=> 'required',
		);
	}

}
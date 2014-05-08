<?php

class ImokosUzAutoController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$imokos_uz_auto = ImokaUzAuto::all();
        return View::make('imokosuzauto.index', compact('imokos_uz_auto'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$registruoti_auto = RegistruotasAuto::lists('valst_nr', 'id');

        return View::make('imokosuzauto.create', compact('registruoti_auto'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//saugoti tarpine lentele + sukurti pacia imoka ir issaugoti
		$validator = Validator::make(Input::all(), ImokaUzAuto::$rules);
		$validator_imoka = Validator::make(Input::all(), Imoka::$rules);

		if ($validator->fails() || $validator_imoka->fails()) {
			return Redirect::to('imokos_uz_auto/create')
				->withErrors($validator)
				->withErrors($validator_imoka);
		} else {
			$imoka = new Imoka;
			$imoka->suma = Input::get('suma');
			$imoka->imoketa = Input::get('imoketa');
			$imoka->paskirtis = Input::get('paskirtis');
			$imoka->save();

			$imokos_uz_auto = new ImokaUzAuto;
			$imokos_uz_auto->auto_id = Input::get('registruotas_auto');
			$imokos_uz_auto->imokos_id = $imoka->id;
			$imokos_uz_auto->save();

			// redirect
			Session::flash('message', 'Sekmingai issaugota imoka');
			return Redirect::to('imokos_uz_auto');
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
        return View::make('imokosuzauto.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('imokosuzauto.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$imokos_uz_auto = ImokaUzAuto::find($id);
		$imokos_uz_auto->delete();

		Session::flash('message', 'Sekmingai istrintas auto imoka');
		return Redirect::to('imokos_uz_auto');
	}

}

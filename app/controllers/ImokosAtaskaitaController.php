<?php

class ImokosAtaskaitaController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$filter_date = Input::get('date', date('Y-m'));

		$result = DB::table('imokos')
		->select(DB::raw("ROUND(SUM(suma), 4) as suma, DATE_FORMAT(imoketa, '%Y-%m') AS imoketa"))
		->groupBy(DB::raw('YEAR(imoketa), MONTH(imoketa)'));
		if($filter_date !== null) {
			$result->having('imoketa', '>', $filter_date);
		}

		$result->get();
        return View::make('imokosataskaitas.index')
        	->with('imoku_ataskaita', $result->get());
	}

	// SELECT round(SUM(suma), 4), DATE_FORMAT(imoketa, '%Y-%m') AS imoketa FROM imokos
	// GROUP BY YEAR(imoketa), MONTH(imoketa)

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('imokosataskaitas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('imokosataskaitas.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('imokosataskaitas.edit');
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
		//
	}

}

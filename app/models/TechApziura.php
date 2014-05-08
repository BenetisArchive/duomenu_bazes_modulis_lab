<?php

class TechApziura extends Eloquent
{
	protected $table = 'tech_apziura';
	public $timestamps = false;

	public function auto()
	{
		return $this->belongsTo('RegistruotasAuto', 'auto_id');
	}

	public function savininkas()
	{
		return $this->belongsTo('Savininkas', 'savininko_id');
	}


	public function get_valst_nr()
	{
		$result = DB::table('tech_apziura')
			->join('registruoti_auto',
				'auto_id', '=', 'registruoti_auto.id')
			->select('valst_nr')
			->where('tech_apziura.id', '=', $this->id)
			->get();
		return !empty($result) ? $result[0]->valst_nr : 'nera';
	}

}
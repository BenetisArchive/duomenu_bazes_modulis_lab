<?php
/**
* Registruotu automobiliu modelis
*/
class RegistruotasAuto extends Eloquent
{
	protected $table = 'registruoti_auto';
	public $timestamps = false;

	public function automodelis()
	{
		return $this->belongsTo('Automodelis', 'modelio_id');
	}

	public function gamintojas()
	{
		return $this->belongsTo('Gamintojas', 'gamintojo_id');
	}

	public function savininkas()
	{
		return $this->belongsTo('Savininkas', 'savininko_id');
	}

	public static $rules = array(
		'automodelis'=> 'required',
		'savininkas'=> 'required',
		'valst_nr'=> 'required',
		'kebulo_nr'=> 'required',
		'iregistruota'=> 'required',
		'auto_rusis'=> 'required',
	);

}
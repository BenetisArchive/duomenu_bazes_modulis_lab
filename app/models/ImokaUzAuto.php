<?php

class ImokaUzAuto extends Eloquent {
	protected $table = 'imokos_uz_auto';
	public $timestamps = false;
	protected $guarded = array();

	public static $rules = array();

	public function auto()
	{
		return $this->belongsTo("RegistruotasAuto", 'auto_id');
	}

	public function imoka()
	{
		return $this->belongsTo("Imoka", 'imokos_id');
	}
}

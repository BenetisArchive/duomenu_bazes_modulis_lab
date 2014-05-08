<?php

class Automodelis extends Eloquent
{
	protected $table = 'auto_modeliai';
	public $timestamps = false;

	public function gamintojas()
	{
	    return $this->belongsTo('Gamintojas', 'gamintojo_id');
	}


}
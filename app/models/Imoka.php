<?php

class Imoka extends Eloquent {
	protected $table = 'imokos';
	public $timestamps = false;
	protected $guarded = array();

	public static $rules = array();
}

<?php

class Retainer extends \Eloquent {
	protected $fillable = [];

    public function organization()
    {

        return $this->belongsTo('Organization');
    }
}
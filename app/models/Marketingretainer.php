<?php

class Marketingretainer extends \Eloquent {
	protected $fillable = [];

    public function organization()
    {

        return $this->belongsTo('Organization');
    }
}
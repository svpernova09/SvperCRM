<?php

class Retainer extends \Eloquent {
	protected $fillable = [
        'title',
        'hours',
        'strategiest_id',
        'account_manager_id',
        'domain',
        'comments'
    ];

    public function organization()
    {

        return $this->belongsTo('Organization');
    }

    public function getstrategiestAttribute()
    {

        return Person::find($this->strategiest_id);
    }

    public function getaccountManagerAttribute()
    {

        return Person::find($this->account_manager_id);
    }
}
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
}
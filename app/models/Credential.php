<?php

class Credential extends \Eloquent {
	protected $fillable = [
        'service_name',
        'organization_id',
        'user_name',
        'password',
        'comments',
    ];

    public function organization()
    {

        return $this->belongsTo('Organization');
    }
}
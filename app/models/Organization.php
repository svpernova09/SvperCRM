<?php

class Organization extends \Eloquent {
	protected $fillable = [];

    public function credentials()
    {
        return $this->hasMany('Credential');
    }

    public function contacts()
    {
        return $this->hasMany('Person');
    }

    public function salesPerson()
    {
        return $this->hasOne('Person', 'id', 'salesperson_id');
    }

    public function accountManager()
    {
        return $this->hasOne('Person', 'id', 'account_manager_id');
    }
}

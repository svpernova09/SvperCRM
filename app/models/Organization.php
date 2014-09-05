<?php

class Organization extends \Eloquent {
    protected $fillable = [
        'name',
        'address',
        'address2',
        'city',
        'state',
        'zip',
        'phone',
        'agency_id',
        'is_agency'
    ];

    public function credentials()
    {

        return $this->hasMany('Credential');
    }

    public function contacts()
    {

        return $this->hasMany('Person');
    }

    public function supportContracts()
    {

        return $this->hasMany('Supportcontract');
    }

    public function marketingRetainers()
    {

        return $this->hasMany('Marketingretainer');
    }

    public function salesPerson()
    {

        return $this->hasOne('Person', 'id', 'salesperson_id');
    }

    public function accountManager()
    {

        return $this->hasOne('Person', 'id', 'account_manager_id');
    }

    public function getAgencyAttribute()
    {
        return Organization::find($this->agency_id);
    }
}

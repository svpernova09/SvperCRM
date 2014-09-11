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

    public function setServiceNameAttribute($value) {
        $this->attributes['service_name'] = Crypt::encrypt($value);
    }

    public function getServiceNameAttribute($value){
        return Crypt::decrypt($value);
    }

    public function setCommentsAttribute($value) {
        $this->attributes['comments'] = Crypt::encrypt($value);
    }

    public function getCommentsAttribute($value){
        return Crypt::decrypt($value);
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Crypt::encrypt($value);
    }

    public function getPasswordAttribute($value){
        return Crypt::decrypt($value);
    }

    public function setUserNameAttribute($value) {
        $this->attributes['user_name'] = Crypt::encrypt($value);
    }

    public function getUserNameAttribute($value){
        return Crypt::decrypt($value);
    }
}
<?php

class Contract extends \Eloquent {
	protected $fillable = [
        'title',
        'hours',
        'start_date',
        'end_date',
        'designer_id',
        'developer_id',
        'platform',
        'domain'
    ];

    public function organization()
    {

        return $this->belongsTo('Organization');
    }

    public function getdeveloperAttribute()
    {

        return Person::find($this->developer_id);
    }

    public function getdesignerAttribute()
    {

        return Person::find($this->designer_id);
    }
}
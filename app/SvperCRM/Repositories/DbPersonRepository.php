<?php namespace SvperCRM\Repositories;

use Person;

class DbPersonRepository implements PersonRepositoryInterface {

    public function getAll()
    {

        return Person::all();
    }

    public function find($id)
    {

        return Person::findOrFail($id);
    }

    public function create($input)
    {

        return Person::create($input);
    }

    public function where($field, $value)
    {

        return Person::where($field, $value)->get();
    }


} 
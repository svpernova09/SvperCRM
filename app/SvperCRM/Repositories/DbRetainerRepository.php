<?php namespace SvperCRM\Repositories;

use Retainer;

class DbRetainerRepository implements RetainerRepositoryInterface {

    public function getAll()
    {

        return Retainer::all();
    }

    public function find($id)
    {

        return Retainer::findOrFail($id);
    }

    public function create($input)
    {

        return Retainer::create($input);
    }

    public function where($field, $value)
    {

        return Retainer::where($field, $value)->get();
    }


} 
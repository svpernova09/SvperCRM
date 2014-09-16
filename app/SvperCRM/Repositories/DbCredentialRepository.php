<?php namespace SvperCRM\Repositories;

use Credential;

class DbCredentialRepository implements CredentialRepositoryInterface {

    public function getAll()
    {

        return Credential::all();
    }

    public function find($id)
    {

        return Credential::findOrFail($id);
    }

    public function create($input)
    {

        return Credential::create($input);
    }

    public function where($field, $value)
    {

        return Credential::where($field, $value)->get();
    }


} 
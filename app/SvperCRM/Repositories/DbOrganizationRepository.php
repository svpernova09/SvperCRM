<?php namespace SvperCRM\Repositories;

use Organization;

class DbOrganizationRepository implements OrganizationRepositoryInterface {

    public function getAll()
    {

        return Organization::all();
    }

    public function find($id)
    {

        return Organization::findOrFail($id);
    }

    public function create($input)
    {
        return Organization::create($input);
    }

    public function where($field, $value)
    {
        return Organization::where($field, $value)->get();
    }


} 
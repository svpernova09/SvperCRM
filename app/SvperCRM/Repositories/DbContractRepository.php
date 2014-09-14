<?php namespace SvperCRM\Repositories;

use Contract;

class DbContractRepository implements ContractRepositoryInterface {

    public function getAll()
    {

        return Contract::all();
    }

    public function find($id)
    {

        return Contract::findOrFail($id);
    }

    public function create($input)
    {

        return Contract::create($input);
    }

    public function where($field, $value)
    {

        return Contract::where($field, $value)->get();
    }


} 
<?php namespace SvperCRM\Repositories;

interface ContractRepositoryInterface {

    public function getAll();
    public function find($id);
    public function create($id);
    public function where($field, $value);
}
<?php namespace SvperCRM\Repositories;

interface OrganizationRepositoryInterface {

    public function getAll();
    public function find($id);
    public function create($id);
    public function where($field, $value);
}
<?php namespace SvperCRM\Repositories;

interface PersonRepositoryInterface {

    public function getAll();
    public function find($id);
    public function create($id);
    public function where($field, $value);
}
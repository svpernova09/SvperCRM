<?php namespace SvperCRM\Repositories;

interface OrganizationRepositoryInterface {

    public function getAll();
    public function find($id);
}
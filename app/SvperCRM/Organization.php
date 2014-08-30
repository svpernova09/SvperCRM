<?php namespace SvperCRM;

use Countable;

class Organization implements Countable
{
    protected $organization;

    public function add($org)
    {
        if(is_array($org))
        {

            return array_map([$this, 'add'], $org);
        }

        $this->organization[] = $org;
    }

    public function count()
    {

        return count($this->organization);
    }
}

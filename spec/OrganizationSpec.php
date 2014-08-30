<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OrganizationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Organization');
    }

    function it_stores_an_organization(\Organization $org)
    {

        $this->add($org);

        $this->shouldHaveCount(1);
    }

    function it_can_accept_multiple_orgs_at_once(\Organization $org1, \Organization $org2)
    {
        $this->add([$org1, $org2]);

        $this->shouldHaveCount(2);
    }

}

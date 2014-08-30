<?php

namespace spec\SvperCRM;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OrganizationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SvperCRM\Organization');
    }

    function it_stores_an_organization(\SvperCRM\Organization $org)
    {

        $this->add($org);

        $this->shouldHaveCount(1);
    }

    function it_can_accept_multiple_orgs_at_once(\SvperCRM\Organization $org1, \SvperCRM\Organization $org2)
    {
        $this->add([$org1, $org2]);

        $this->shouldHaveCount(2);
    }

}

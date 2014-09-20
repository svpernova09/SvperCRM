<?php

class OrganizationTest extends PHPUnit_Framework_TestCase {

    use Watson\Testing\ModelHelpers;

    public $organization;

    public function setUp()
    {
        parent::setUp();

        $this->organization = new Organization;
    }

    public function testValidatesOrganization()
    {
        $this->assertValidatesRequired($this->organization, 'name');

    }

}

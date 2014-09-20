<?php

use Laracasts\TestDummy\Factory;

class OrganizationsControllerTest extends TestCase {

    public function testIndex()
    {
        $organizations = Factory::times(2)->create('Organization');

        $this->action('GET', 'OrganizationsController@index');

        $this->assertResponseOk();
        $this->assertViewIs('organizations.index');
        $this->assertViewHas('organizations');
    }

    public function testShow()
    {
        $org = [
            'id' => 1,
        ];
        $organization = Factory::create('Organization', $org);

        $this->action('GET', 'OrganizationsController@show', 1);

        $this->assertResponseOk();
        $this->assertViewIs('organizations.show');
        $this->assertViewHas('organization');
    }

    public function testEdit()
    {
        $org = [
            'id' => 1,
        ];
        $organization = Factory::create('Organization', $org);

        $this->action('GET', 'OrganizationsController@edit', 1);

        $this->assertResponseOk();
        $this->assertViewIs('organizations.edit');
        $this->assertViewHas('org');
    }

}

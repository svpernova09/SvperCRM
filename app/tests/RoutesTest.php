<?php

class RoutesTest extends TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testOrganizationRoutes()
    {
        $this->call('GET', '/organizations');

        $this->assertResponseOk();
    }

    public function testPeopleRoutes()
    {
        $this->call('GET', '/people');

        $this->assertResponseOk();
    }

    public function testCredentialsRoutes()
    {
        $this->call('GET', '/credentials');

        $this->assertResponseOk();
    }

    public function testMarketingRetainersRoutes()
    {
        $this->call('GET', '/marketingretainers');

        $this->assertResponseOk();
    }

    public function testSupportContractsRoutes()
    {
        $this->call('GET', '/supportcontracts');

        $this->assertResponseOk();
    }

}

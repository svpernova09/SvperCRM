<?php

class OrganizationsControllerTest extends TestCase {

    public function tearDown()
    {
        Mockery::close();
    }

    public function __construct()
    {
        parent::setUp();

        $this->mock = Mockery::mock('Eloquent', 'Organization');
    }

    public function testIndex()
    {
        $this->mock
            ->shouldReceive('all')
            ->once()
            ->andReturn('foo');

        $this->app->instance('Organization', $this->mock);

        $this->call('GET', '/organizations');

        $this->assertViewHas('organizations');
    }
}

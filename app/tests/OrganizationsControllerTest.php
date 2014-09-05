<?php

class OrganizationsControllerTest extends TestCase {

    public function tearDown()
    {
        Mockery::close();
    }

    public function setUp()
    {
        parent::setUp();

        $this->mock = Mockery::mock('Organization');
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

    public function testCreate()
    {
        $this->call('GET', '/organizations/create');

        $this->assertResponseOk();
    }

    public function testStoreSuccess()
    {
        // Set stage for successful validation
        $input = [
            'name' => 'RocketFuel',
            'address' => '88 Union Ave',
            'address2' => '7th Floor',
            'city' => 'Memphis',
            'state' => 'TN',
            'zip' => '38103',
            'phone' => '(901) 522-0205',
        ];

        $this->mock
            ->shouldReceive('create')
            ->once();

        $this->app->instance('Organization', $this->mock);

        $this->call('POST', 'organizations', $input);

        // Should redirect to collection, with a success flash message
        $this->assertRedirectedToRoute('organizations.index', null, ['flash']);
    }

    public function testStoreFails()
    {
        // Set stage for a failed validation
        $input = ['name' => ''];

        $this->app->instance('Organization', $this->mock);

        $this->call('POST', 'organizations', $input);
        // Failed validation should reload the create form
        $this->assertRedirectedToRoute('organizations.create');

        // The errors should be sent to the view
        $this->assertSessionHasErrors(['name']);
    }

    public function testShow()
    {
        $this->mock
            ->shouldReceive('find')
            ->once();

        $this->app->instance('Organization', $this->mock);

        $this->call('GET', 'organizations/1');
        $this->assertViewHas('org');
    }

//    public function testEdit()
//    {
//        $this->mock
//            ->shouldReceive('find')
//            ->once();
//
//        $this->app->instance('Organization', $this->mock);
//
//        $this->call('GET', 'organizations/1/edit');
//        $this->assertViewHas('org');
//    }
}

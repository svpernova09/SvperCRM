<?php

class PeopleControllerTest extends TestCase {

    public function tearDown()
    {
        Mockery::close();
    }

    public function setUp()
    {
        parent::setUp();

        $this->mock = Mockery::mock(
            'SvperCRM\Repositories\PersonRepositoryInterface'
        );
    }

    public function testIndex()
    {
        $this->mock
            ->shouldReceive('getAll')
            ->once()
            ->andReturn(array());

        $this->app->instance(
            'SvperCRM\Repositories\PersonRepositoryInterface',
            $this->mock
        );

        $this->call('GET', 'people');

        $this->assertViewHas('people');

    }

//    public function testCreate()
//    {
//        $this->mock
//            ->shouldReceive('create')
//            ->once();
//
//        $this->app->instance(
//            'SvperCRM\Repositories\PersonRepositoryInterface',
//            $this->mock
//        );
//
//        $this->call('GET', '/people/create');
//
//        $this->assertResponseOk();
//    }

    public function testStoreSuccess()
    {
        // Set stage for successful validation
        $input = [
            'first_name' => 'Joe',
            'last_name' => 'Ferguson',
            'organization_id' => '1',
            'address' => '88 Union Ave',
            'address2' => '7th Floor',
            'city' => 'Memphis',
            'state' => 'TN',
            'zip' => '38103',
            'office_phone' => '(901) 522-0205',
            'mobile_phone' => '(901) 949-8986',
            'email' => 'joe@gorocketfuel.com',
        ];

        $this->mock
            ->shouldReceive('create')
            ->once();

        $this->app->instance(
            'SvperCRM\Repositories\PersonRepositoryInterface',
            $this->mock
        );

        $this->call('POST', 'people', $input);

        // Should redirect to collection, with a success flash message
        $this->assertRedirectedToRoute('people.index', null, ['flash']);
    }

    public function testStoreFails()
    {
        // Set stage for a failed validation
        $input = ['first_name' => ''];

        $this->mock
            ->shouldReceive('create')
            ->never();

        $this->app->instance(
            'SvperCRM\Repositories\PersonRepositoryInterface',
            $this->mock
        );

        $this->call('POST', 'people', $input);
        // Failed validation should reload the create form
        $this->assertRedirectedToRoute('people.create');

        // The errors should be sent to the view
        $this->assertSessionHasErrors(['first_name']);
    }

    public function testShow()
    {
        $this->mock
            ->shouldReceive('find')
            ->once()
            ->andReturn(array());

        $this->app->instance(
            'SvperCRM\Repositories\PersonRepositoryInterface',
            $this->mock
        );

        $this->call('GET', 'people/1');
        $this->assertViewHas('person');
    }

//    public function testEdit()
//    {
//        $this->mock
//            ->shouldReceive('find')
//            ->once();
//
//        $this->app->instance('Person', $this->mock);
//
//        $this->call('GET', 'people/1/edit');
//        $this->assertViewHas('org');
//    }
}

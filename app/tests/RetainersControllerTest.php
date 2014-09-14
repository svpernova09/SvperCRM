<?php

class RetainersControllerTest extends TestCase {

    public function tearDown()
    {
        Mockery::close();
    }

    public function setUp()
    {
        parent::setUp();

        $this->mock = Mockery::mock(
            'SvperCRM\Repositories\RetainerRepositoryInterface'
        );

        $this->mock->person = Mockery::mock(
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
            'SvperCRM\Repositories\RetainerRepositoryInterface',
            $this->mock
        );

        $this->call('GET', 'retainers');

        $this->assertViewHas('retainers');

    }

    public function testCreate()
    {
//        $this->mock
//            ->shouldReceive('where')
//            ->once()
//            ->andReturn(array());

        $this->mock->person
            ->shouldReceive('where')
            ->twice()
            ->andReturn(array());

        $this->app->instance(
            'SvperCRM\Repositories\RetainerRepositoryInterface',
            $this->mock
        );

        $this->app->instance(
            'SvperCRM\Repositories\PersonRepositoryInterface',
            $this->mock->person
        );

        $this->call('GET', '/retainers/create');

        $this->assertResponseOk();
        $this->assertViewHas('marketers');
        $this->assertViewHas('accountManagers');
    }

    public function testStoreSuccess()
    {
        // Set stage for successful validation
        $input = [
            'title' => 'RocketFuel',
            'hours' => '20',
            'start_date' => '1',
            'end_date' => '1',
            'designer_id' => '1',
            'developer_id' => '1',
            'platform' => 'Platform',
            'domain' => 'domain'
        ];

        $this->mock
            ->shouldReceive('create')
            ->once();

        $this->app->instance(
            'SvperCRM\Repositories\RetainerRepositoryInterface',
            $this->mock
        );

        $this->call('POST', 'retainers', $input);

        // Should redirect to collection, with a success flash message
        $this->assertRedirectedToRoute('retainers.index', null, ['flash']);
    }

    public function testStoreFails()
    {
        // Set stage for a failed validation
        $input = ['title' => ''];

        $this->mock
            ->shouldReceive('create')
            ->never();

        $this->app->instance(
            'SvperCRM\Repositories\RetainerRepositoryInterface',
            $this->mock
        );

        $this->call('POST', 'retainers', $input);
        // Failed validation should reload the create form
        $this->assertRedirectedToRoute('retainers.create');

        // The errors should be sent to the view
        $this->assertSessionHasErrors(['title']);
    }

    public function testShow()
    {
        $this->mock
            ->shouldReceive('find')
            ->once()
            ->andReturn(array());

        $this->app->instance(
            'SvperCRM\Repositories\RetainerRepositoryInterface',
            $this->mock
        );

        $this->call('GET', 'retainers/1');
        $this->assertViewHas('retainer');
    }

    public function testEdit()
    {
        $this->mock
            ->shouldReceive('find')
            ->once()
            ->andReturn(array());

        $this->mock->person
            ->shouldReceive('where')
            ->twice()
            ->andReturn(array());

        $this->app->instance(
            'SvperCRM\Repositories\RetainerRepositoryInterface',
            $this->mock
        );

        $this->app->instance(
            'SvperCRM\Repositories\PersonRepositoryInterface',
            $this->mock->person
        );

        $this->call('GET', 'retainers/1/edit');

        $this->assertResponseOk();
        $this->assertViewHas('retainer');
        $this->assertViewHas('accountManagers');
        $this->assertViewHas('marketers');
    }
}

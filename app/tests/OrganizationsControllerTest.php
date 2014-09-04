<?php
//
//
//class OrganizationsControllerTest extends TestCase {
//
//    public function __construct()
//    {
//        parent::setUp();
//        // We have no interest in testing Eloquent
//        $this->mock = Mockery::mock('Eloquent', 'Organization');
//    }
//
//    public function tearDown()
//    {
//        Mockery::close();
//    }
//
//    public function testIndex()
//    {
//        $this->mock
//            ->shouldReceive('all')
//            ->once()
//            ->andReturn('foo');
//
//        $this->app->instance('Organization', $this->mock);
//
//        $this->call('GET', 'organizations');
//
//        $this->assertViewHas('organizations');
//    }
//}

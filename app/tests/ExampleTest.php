<?php

class ExampleTest extends TestCase {

    public function setUp()
    {
//        parent::setUp();
//
//        Artisan::call('migrate');
    }
	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

//    public function test_fetches_adult_dogs()
//    {
//        Dog::create(['name' => 'Rover', 'age' => 1]);
//        Dog::create(['name' => 'Spot', 'age' => 7]);
//
//        $dogs = Dog::adults()->get();
//
//        $this->assertCount(1, $dogs);
//    }
}

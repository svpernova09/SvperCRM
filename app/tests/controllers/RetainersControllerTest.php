<?php

use Laracasts\TestDummy\Factory;

class RetainersControllerTest extends TestCase {

    public function testIndex()
    {
        $retainers = Factory::times(2)->create('Retainer');

        $this->action('GET', 'RetainersController@index');

        $this->assertResponseOk();
        $this->assertViewIs('retainers.index');
        $this->assertViewHas('retainers');
    }

    public function testShow()
    {
        $retainers = [
            'id' => 1,
        ];
        $retainer = Factory::create('Retainer', $retainers);

        $this->action('GET', 'RetainersController@show', 1);

        $this->assertResponseOk();
        $this->assertViewIs('retainers.show');
        $this->assertViewHas('retainer');
    }

    public function testEdit()
    {
        $retainers = [
            'id' => 1,
        ];
        $retainer = Factory::create('Retainer', $retainers);

        $this->action('GET', 'RetainersController@edit', 1);

        $this->assertResponseOk();
        $this->assertViewIs('retainers.edit');
        $this->assertViewHas('retainer');
    }
}

<?php

use Laracasts\TestDummy\Factory;

class PeopleControllerTest extends TestCase {

    public function testIndex()
    {
        $people = Factory::times(2)->create('Person');

        $this->action('GET', 'PeopleController@index');

        $this->assertResponseOk();
        $this->assertViewIs('people.index');
        $this->assertViewHas('people');
    }

    public function testShow()
    {
        $people = [
            'id' => 1,
        ];
        $person = Factory::create('Person', $people);

        $this->action('GET', 'PeopleController@show', 1);

        $this->assertResponseOk();
        $this->assertViewIs('people.show');
        $this->assertViewHas('person');
    }

    public function testEdit()
    {
        $people = [
            'id' => 1,
        ];
        $person = Factory::create('Person', $people);

        $this->action('GET', 'PeopleController@edit', 1);

        $this->assertResponseOk();
        $this->assertViewIs('people.edit');
        $this->assertViewHas('person');
    }

}

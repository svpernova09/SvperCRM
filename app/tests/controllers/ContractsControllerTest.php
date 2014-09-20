<?php

use Laracasts\TestDummy\Factory;

class ContractsControllerTest extends TestCase {

    public function testIndex()
    {
        $contracts = Factory::times(2)->create('Contract');

        $this->action('GET', 'ContractsController@index');

        $this->assertResponseOk();
        $this->assertViewIs('contracts.index');
        $this->assertViewHas('contracts');
    }

    public function testShow()
    {
        $contracts = [
            'id' => 1,
        ];
        $contract = Factory::create('Contract', $contracts);

        $this->action('GET', 'ContractsController@show', 1);

        $this->assertResponseOk();
        $this->assertViewIs('contracts.show');
        $this->assertViewHas('contract');
    }

    public function testEdit()
    {
        $contracts = [
            'id' => 1,
        ];
        $contract = Factory::create('Contract', $contracts);

        $this->action('GET', 'ContractsController@edit', 1);

        $this->assertResponseOk();
        $this->assertViewIs('contracts.edit');
        $this->assertViewHas('contract');
    }

}

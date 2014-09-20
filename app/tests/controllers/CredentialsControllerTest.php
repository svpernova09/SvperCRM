<?php

use Laracasts\TestDummy\Factory;

class CredentialsControllerTest extends TestCase {

    public function testIndex()
    {
        $credentials = Factory::times(2)->create('Credential');

        $this->action('GET', 'CredentialsController@index');

        $this->assertResponseOk();
        $this->assertViewIs('credentials.index');
        $this->assertViewHas('credentials');
    }

    public function testShow()
    {
        $credentials = [
            'id' => 1,
        ];
        $credential = Factory::create('Credential', $credentials);
        $org = Factory::create('Organization', $credentials);

        $this->action('GET', 'CredentialsController@show', array(1,1));

        $this->assertResponseOk();
        $this->assertViewIs('credentials.show');
        $this->assertViewHas('credential');
    }

    public function testEdit()
    {
        $credentials = [
            'id' => 1,
        ];
        $credential = Factory::create('Credential', $credentials);
        $org = Factory::create('Organization', $credentials);
        
        $this->action('GET', 'CredentialsController@edit', array(1,1));

        $this->assertResponseOk();
        $this->assertViewIs('credentials.edit');
        $this->assertViewHas('credential');
    }
}

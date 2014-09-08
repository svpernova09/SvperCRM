<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('SentryGroupSeeder');
        $this->call('SentryUserSeeder');
        $this->call('SentryUserGroupSeeder');
        $this->call('OrganizationsTableSeeder');
        $this->call('PeopleTableSeeder');
        $this->call('RetainersTableSeeder');
        $this->call('ContractsTableSeeder');
        $this->call('CredentialsTableSeeder');
	}

}

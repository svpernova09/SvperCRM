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

        $this->call('OrganizationsTableSeeder');
        $this->call('PeopleTableSeeder');
        $this->call('MarketingretainersTableSeeder');
        $this->call('SupportcontractsTableSeeder');
        $this->call('CredentialsTableSeeder');
	}

}

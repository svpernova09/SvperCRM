<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MarketingretainersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Marketingretainer::create([
                'title' => $faker->company,
                'hours' => '20',
                'strategist_id' => '1',
                'account_manager_id' => '1',
                'domain' => $faker->domainName
			]);
		}
	}

}
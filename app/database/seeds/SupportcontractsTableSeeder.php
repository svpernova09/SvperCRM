<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SupportcontractsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Supportcontract::create([
                'title' => $faker->company,
                'hours' => '20',
                'start_date' => '1',
                'end_date' => '1',
                'designer_id' => '1',
                'developer_id' => '1',
                'platform' => $faker->text,
                'domain' => $faker->domainName
			]);
		}
	}

}
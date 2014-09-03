<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OrganizationsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        Organization::create([
            'name' => 'RocketFuel',
            'address' => '88 Union Ave',
            'address2' => '7th Floor',
            'city' => 'Memphis',
            'state' => 'TN',
            'zip' => '38103',
            'phone' => '(901) 522-0205',

        ]);

		foreach(range(1, 10) as $index)
		{
			Organization::create([
                'name' => $faker->name,
                'address' => $faker->streetAddress,
                'address2' => $faker->secondaryAddress,
                'city' => $faker->city,
                'state' => $faker->stateAbbr,
                'zip' => $faker->postcode,
                'phone' => $faker->phoneNumber,

			]);
		}
	}

}
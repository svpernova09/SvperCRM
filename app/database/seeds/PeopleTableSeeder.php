<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PeopleTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        Person::create([
            'name' => 'Joe Ferguson',
            'organization_id' => '1',
            'address' => '88 Union Ave',
            'address2' => '7th Floor',
            'city' => 'Memphis',
            'state' => 'TN',
            'zip' => '38103',
            'office_phone' => '(901) 522-0205',
            'mobile_phone' => '(901) 949-8986',
            'email' => 'joe@gorocketfuel.com',
        ]);

		foreach(range(1, 10) as $index)
		{
			Person::create([
                'name' => $faker->name,
                'organization_id' => '2',
                'address' => $faker->streetAddress,
                'address2' => $faker->secondaryAddress,
                'city' => $faker->city,
                'state' => $faker->stateAbbr,
                'zip' => $faker->postcode,
                'office_phone' => $faker->phoneNumber,
                'mobile_phone' => $faker->phoneNumber,
                'email' => $faker->email,
			]);
		}
	}

}
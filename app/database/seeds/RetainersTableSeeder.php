<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RetainersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 10) as $index)
        {
            Retainer::create([
                'title' => $faker->company,
                'hours' => '20',
                'strategiest_id' => '1',
                'account_manager_id' => '1',
                'domain' => $faker->domainName
            ]);
        }
    }

}
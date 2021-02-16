<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FrogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'name', 'gender','date_of_birth','date_of_death','pond_number'

        //Frogs::truncate();

        Frogs::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Frogs::create([
                'name' => $faker->sentence,
                'gender' => $faker->paragraph,
            ]);
        }
       
        // Frogs::create([
        //         'name' => "ahmad",
        //         'gender' => "male",
        //         'date_of_birth' => 1/1/2011,
        //         'date_of_death' => 1/5/2011,
        //         'pond_number' => "5",
        //     ]);
    }
}

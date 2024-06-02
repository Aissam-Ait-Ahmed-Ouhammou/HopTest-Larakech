<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $faker = FakerFactory::create();

        // Define the possible statuses
        $statuses = ['CLIENT', 'LEAD', 'PROSPECT'];

        foreach (range(1, 100) as $index) {
            Contact::create([
                'nom' => $faker->firstName,
                'prenom' => $faker->lastName,
                'email' => $faker->email,
                'entreprise' => $faker->company,
                'address' => $faker->address,
                'code_postal' => $faker->randomNumber(5, true),
                'ville' => $faker->city,
                'status' => $faker->randomElement($statuses),
            ]);
        }

    }
}

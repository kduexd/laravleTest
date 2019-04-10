<?php

use Illuminate\Database\Seeder;
use App\member;

class memberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $fake = \Faker\Factory::create();

        for ($i=0;$i<10;$i++){
            member::create([
                'Account' => $fake->bankAccountNumber,
                'Password' => $fake->password,
            ]);
        }
    }
}

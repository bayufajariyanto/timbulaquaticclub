<?php

use App\Pertanyaan;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 5; $i++) { 
            DB::table('pertanyaans')->insert([
                'tanggal' => $faker->date('Y-m-d'),
                'nama' => $faker->name,
                'email' => $faker->email,
                'telp' => $faker->phoneNumber,
                'pesan' => $faker->sentence
            ]);
        }
    }
}

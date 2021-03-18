<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = "guru";
        $admin->email = "guru@gmail.com";
        $admin->password = Hash::make("guru");
        $admin->roles = "Admin";
        $admin->save();

        $this->command->info("Guru berhasil ditambahkan!");
        
        $student = new User();
        $student->name = "murid";
        $student->email = "murid@gmail.com";
        $student->password = Hash::make("murid");
        $student->roles = "Student";
        $student->save();

        $this->command->info("Atlit berhasil ditambahkan!");
    }
}

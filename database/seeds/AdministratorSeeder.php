<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = "administrator";
        $admin->email = "admin@gmail.com";
        $admin->password = Hash::make("admin");
        $admin->roles = "Super Admin";
        $admin->save();

        $this->command->info("Super Admin berhasil ditambahkan!");
    }
}

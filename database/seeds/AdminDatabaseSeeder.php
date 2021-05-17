<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Yousef Ibrahim Mahmoud',
            'email' => 'yo0114800@gmail.com',
            'password' => bcrypt('01016736771'),
        ]);

    }
}

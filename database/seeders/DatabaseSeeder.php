<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //Тестовый админ
        Admin::create([
            'login' => 'root',
            'password' => 'root'
        ]);

        //Наполнение каталога
        $this->call(TestSeeder::class);
    }
}

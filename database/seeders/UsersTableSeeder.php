<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Traits\TraitSeeder;
use App\Models\User as Model;

class UsersTableSeeder extends Seeder
{
    use TraitSeeder;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->smartySeeder(new Model, [
            ['id' => 1, 'name' => 'Mateus', 'email' => 'mateus.guizelini@hotmail.com', 'password' => '123456', 'level' => 'Gerente1'],
            ['id' => 2, 'name' => 'Adriano', 'email' => 'adriano@hotmail.com', 'password' => '12341234', 'level' => 'Gerente2'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Traits\TraitSeeder;
use App\Models\Client as Model;

class ClientsTableSeeder extends Seeder
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
            ['id' => 1, 'name' => 'Cliente A', 'cnpj' => '62362600000157', 'date_founding' => '2013-05-23', 'group_id' => '2'],
            ['id' => 2, 'name' => 'Cliente B', 'cnpj' => '38744288000181', 'date_founding' => '2018-01-06', 'group_id' => '1'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OfficesTableSeeder extends Seeder
{
    private $offices = [
        'A10' => 'Офис 1',
        'A20' => 'Офис 2',
        'A30' => 'Офис 3',
        'A40' => 'Офис 4',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->offices as $code => $name) {
            \App\Model\Office::firstOrCreate(
                ['code' => $code],
                ['name' => $name]
            );
        }
    }
}

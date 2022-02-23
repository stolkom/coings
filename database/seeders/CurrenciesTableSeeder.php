<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    private $apiUrl = 'https://openexchangerates.org/api/currencies.json';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currenciesArray = json_decode(
            file_get_contents($this->apiUrl),
            true
        );

        if (empty($currenciesArray)) return;

        foreach($currenciesArray as $code => $name) {
            Currency::updateOrCreate(
                ['code' => $code],
                ['code' => $code, 'name' => $name]
            );
        }
    }
}

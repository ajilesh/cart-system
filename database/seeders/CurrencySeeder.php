<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currency = [['code' => 'USD',
        'name' => 'United State Of America',
        'symbol' => '$',
        'exchange_rate' => '1' ],
        ['code' => 'INR',
        'name' => 'India',
        'symbol' => '₹',
        'exchange_rate' => '83.3' ]];
        foreach($currency as $currency)
        {
            \App\Models\Currency::create($currency);
        }
       
    }
}

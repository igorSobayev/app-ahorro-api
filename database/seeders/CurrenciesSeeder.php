<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $currency = new Currency();
        $currency->name = 'EUR';
        $currency->currency_icon = '€';
        $currency->status = true;
        $currency->save();

        $currency = new Currency();
        $currency->name = 'USD';
        $currency->currency_icon = '$';
        $currency->status = true;
        $currency->save();

        $currency = new Currency();
        $currency->name = 'JPY';
        $currency->currency_icon = '¥';
        $currency->status = true;
        $currency->save();

        $currency = new Currency();
        $currency->name = 'GBP';
        $currency->currency_icon = '£';
        $currency->status = true;
        $currency->save();

        $currency = new Currency();
        $currency->name = 'CHF';
        $currency->currency_icon = 'Fr';
        $currency->status = true;
        $currency->save();

        $currency = new Currency();
        $currency->name = 'HKD';
        $currency->currency_icon = '$';
        $currency->status = true;
        $currency->save();

        $currency = new Currency();
        $currency->name = 'AUD';
        $currency->currency_icon = '$';
        $currency->status = true;
        $currency->save();

        $currency = new Currency();
        $currency->name = 'CAD';
        $currency->currency_icon = 'C$';
        $currency->status = true;
        $currency->save();
    }
}

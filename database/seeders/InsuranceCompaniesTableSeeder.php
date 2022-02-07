<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsuranceCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $insurance_companies = [
                'Страховая компания Мир',
                'Первая страховая компания',
                'Лучшая страховая компания',
                'Страховая компания Юпитер',
                'Страховая компания ОСОГО',
                'Страховая компания ЮГОР',
                'Страховой Дом',

            ];

            foreach ($insurance_companies as $insurance_company) {
                DB::table('insurance_companies')->insert([
                    'name' => $insurance_company
                ]);
            }


    }
}

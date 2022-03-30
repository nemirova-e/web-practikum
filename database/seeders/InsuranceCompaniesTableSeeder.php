<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
                'Страховая компания Застрахую все',
                'Страховая компания номер 1',
            ];

        foreach ($insurance_companies as $insurance_company) {
            DB::table('insurance_companies')->insert([
                    'name' => $insurance_company,
                    'email' => Str::random(10).'@gmail.com',
                ]);
        }
    }
}

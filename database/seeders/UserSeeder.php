<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $roles = [
            'admin',
            'agent',
            'agent',
            'agent',
            'agent',
            'agent'];

        foreach ($roles as $role) {
            DB::table('users')->insert([
            'name' => ($role === 'admin') ? 'admin' : (Str::random(10)),
            'email' => ($role === 'admin') ? 'admin@gmail.com' : (Str::random(10) . '@gmail.com'),
            'password' => Hash::make('testtest'),
            'insurance_company_id' => ($role === 'admin') ? null : (rand(1, 9)),
            'role' => $role
            ]);
        }
    }
}

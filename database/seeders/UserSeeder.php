<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(
            [
                [
                    'name' => 'Petugas Gizi',
                    'email' => 'gizi@gmail.com',
                    'role' => 'Admin',
                    'email_verified_at' => Carbon::now(),
                    'password' => Hash::make('Admin123'),
                ],
                [
                    'name' => 'Kepala Puskesmas',
                    'email' => 'kepala@gmail.com',
                    'role' => 'User',
                    'email_verified_at' => Carbon::now(),
                    'password' => Hash::make('kepala123'),
                ]
            ]
        )->each(function ($user) {
            DB::table('users')->insert($user);
        });
    }
}

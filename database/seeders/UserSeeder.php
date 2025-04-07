<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::create([
            'name' => 'Marcel Jay Milla Cabauatan',
            'account_number' => 'C-675',
            'account_created' => Carbon::now()->timezone('Asia/Manila'),
            'email' => 'marcel.cabauatan@afab.gov.ph',
            'password' => Hash::make('password'),
            
        ]);
    }
}

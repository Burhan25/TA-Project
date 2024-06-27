<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        User::query()->create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>Hash::make('admin123'),
            'status'=>0,
            'role'=>UserRole::ADMIN,
        ]);
        User::query()->create([
            'name'=>'Dokter 1',
            'email'=>'dokter1@gmail.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>Hash::make('dokter123'),
            'status'=>0,
            'role'=>UserRole::DOKTER,
        ]);
        User::query()->create([
            'name'=>'Dokter 2',
            'email'=>'dokter2@gmail.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>Hash::make('dokter123'),
            'status'=>0,
            'role'=>UserRole::DOKTER,
        ]);
        User::query()->create([
            'name'=>'Dokter 3',
            'email'=>'dokter3@gmail.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>Hash::make('dokter123'),
            'status'=>0,
            'role'=>UserRole::DOKTER,
        ]);
        User::query()->create([
            'name'=>'User 1',
            'email'=>'user1@gmail.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>Hash::make('user123'),
            'status'=>0,
            'role'=>UserRole::USER,
        ]);
        User::query()->create([
            'name'=>'User 2',
            'email'=>'user2@gmail.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>Hash::make('user123'),
            'status'=>0,
            'role'=>UserRole::USER,
        ]);
        User::query()->create([
            'name'=>'User 3',
            'email'=>'user3@gmail.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>Hash::make('user123'),
            'status'=>0,
            'role'=>UserRole::USER,
        ]);
    }
}

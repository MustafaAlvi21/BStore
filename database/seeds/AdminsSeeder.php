<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'id' => Str::uuid(),
            'name' => "Muhammad Mustafa",
            'username' => 'muhammadmustafa',
            'password' => Hash::make("mustafa123"),
            'email' => "mus78khan@yahoo.com",
            'created_at' => Carbon::now(),
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default Users
        // DB::table('users')->insert([
        //     'id' => Str::uuid(),
        //     'name' => "Bilquees",
        //     'email' => "bilquisahmed28@gmail.com",
        //     'password' => Hash::make("bilquees123.."),
        //     'birth_year' => "1998",
        //     'gender' => "female",
        //     'profile_info' => "I'm expert in mathematics.",
        //     'skype_id' => "bilquis123",
        //     'phone' => "03152260603",
        //     'country' => "Pakistan",
        //     'state' => "Sindh",
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        // ]);

      
        // DB::table('users')->insert([
        //     'id' => Str::uuid(),
        //     'name' => "Ashfaq Ali Zardari",
        //     'email' => '3atech786@gmail.com',
        //     'password' => Hash::make("ashfaq123.."),
        //     'birth_year' => "1999",
        //     'gender' => "male",
        //     'profile_info' => "I'm full stack web, desktop and android developer.",
        //     'skype_id' => "ashfaq123",
        //     'phone' => "03152260604",
        //     'country' => "Pakistan",
        //     'state' => "Sindh",
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        // ]);
        
        // DB::table('users')->insert([
        //     'id' => Str::uuid(),
        //     'name' => "Muhammad Mustafa",
        //     'email' => "mustafaalvi21@gmail.com",
        //     'password' => Hash::make("mustafa123.."),
        //     'birth_year' => "1998",
        //     'gender' => "male",
        //     'profile_info' => "I'm expert in programming.",
        //     'skype_id' => "m.mustafa123",
        //     'phone' => "03152260602",
        //     'country' => "Pakistan",
        //     'state' => "Sindh",
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        // ]);

        
        // DB::table('users')->insert([
        //     'id' => Str::uuid(),
        //     'name' => "Dhoondle Management",
        //     'email' => 'dhoondlemanagement@gmail.com',
        //     'password' => Hash::make("dhoondle123.."),
        //     'birth_year' => "1999",
        //     'gender' => "male",
        //     'profile_info' => "I am expert in android studio..",
        //     'skype_id' => "dhoondle123",
        //     'phone' => "03152260604",
        //     'country' => "Pakistan",
        //     'state' => "Sindh",
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        // ]);

        
        // DB::table('users')->insert([
        //     'id' => Str::uuid(),
        //     'name' => "Samia Ejaz",
        //     'email' => 'samiasiddiqui@hotmail.com',
        //     'password' => Hash::make("samia123.."),
        //     'birth_year' => "1995",
        //     'gender' => "Female",
        //     'profile_info' => "I am expert in programming.",
        //     'skype_id' => "samia.ejaz123",
        //     'phone' => "03222098765",
        //     'country' => "Pakistan",
        //     'state' => "Sindh",
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        // ]);

        
        // DB::table('users')->insert([
        //     'id' => Str::uuid(),
        //     'name' => "Muhammad Ahmed",
        //     'email' => 'ahmedsikander763@gmail.com',
        //     'password' => Hash::make("ahmed123.."),
        //     'birth_year' => "1999",
        //     'gender' => "male",
        //     'profile_info' => " I am a professional lawyer having 10 years of legal experience.  I have experience in technology. ",
        //     'skype_id' => "m.ahmed123",
        //     'phone' => "09876543212",
        //     'country' => "Pakistan",
        //     'state' => "Sindh",
        //     'email_verified_at' => Carbon::now(),
        //     'created_at' => Carbon::now(),
        // ]);

    }
}
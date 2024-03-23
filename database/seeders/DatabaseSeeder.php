<?php

namespace Database\Seeders;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user = User::where('email','admin@smc.com')->first();
        if(is_null($user)){
            User::create([
                'name' => 'Admin',
                'email' => 'drzakaurrahmansaharanpuri42@gmail.com',
                'password' => Hash::make('dr4742@123.'),
            ]);
        }
        // $this->call([
        //     BrandSeeder::class,
        //     CategorySeeder::class,
        //     VariationDetailSeeder::class,
        //     VariationSeeder::class
        // ]);
    }
}

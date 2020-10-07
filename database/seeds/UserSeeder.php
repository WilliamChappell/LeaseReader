<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'William Chappell',
            'email' => 'william_chappell@hotmail.co.uk',
            'password' => '$2y$10$P9TVGvskc/wLEYRMUB6qWesWCgNtY1grUVDCf5TyBmRcd4RwY2bpS',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        
    }
}

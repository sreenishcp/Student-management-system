<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            [
                'name' => 'Katie',
                'created_at' => Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'name' => 'Max',
                'created_at' => Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ]);
    }
}

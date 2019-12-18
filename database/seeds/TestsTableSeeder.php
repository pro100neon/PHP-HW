<?php

use Illuminate\Database\Seeder;


class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Test::class, 10)->create();
    }
}

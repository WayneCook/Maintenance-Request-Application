<?php

use Illuminate\Database\Seeder;
use App\workOrder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\workOrder::class, 100)->create();
    }
}

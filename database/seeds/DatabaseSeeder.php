<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PagesSeeder::class);
        $this->call(PortfoliosSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(PeoplesSeeder::class);
    }
}

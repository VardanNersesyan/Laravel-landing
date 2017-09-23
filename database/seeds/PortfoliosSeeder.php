<?php

use Illuminate\Database\Seeder;

use App\Portfolio;

class PortfoliosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portfolio::insert([
            [
                'name'   => 'SMS Mobile App',
                'images' => 'portfolio_pic1.jpg',
                'filter' => 'appleIOS'
            ],
            [
                'name'   => 'Finance App',
                'images' => 'portfolio_pic2.jpg',
                'filter' => 'design'
            ],
            [
                'name'   => 'GPS Concept',
                'images' => 'portfolio_pic3.jpg',
                'filter' => 'design'
            ],
            [
                'name'   => 'Shopping',
                'images' => 'portfolio_pic4.jpg',
                'filter' => 'android'
            ],
            [
                'name'   => 'Managment',
                'images' => 'portfolio_pic5.jpg',
                'filter' => 'design'
            ],
            [
                'name'   => 'iPhone',
                'images' => 'portfolio_pic6.jpg',
                'filter' => 'web'
            ],
            [
                'name'   => 'Nexus Phone',
                'images' => 'portfolio_pic7.jpg',
                'filter' => 'web'
            ],
            [
                'name'   => 'Android',
                'images' => 'portfolio_pic8.jpg',
                'filter' => 'android'
            ],
        ]);
    }
}

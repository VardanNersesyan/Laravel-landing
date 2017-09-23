<?php

use Illuminate\Database\Seeder;

use App\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::insert([
            [
                'name' => 'Android',
                'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.',
                'icon' => 'fa-android'
            ],
            [
                'name' => 'Apple IOS',
                'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.',
                'icon' => 'fa-apple'
            ],
            [
                'name' => 'Design',
                'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.',
                'icon' => 'fa-dropbox'
            ],
            [
                'name' => 'Concept',
                'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.',
                'icon' => 'fa-html5'
            ],
            [
                'name' => 'User Research',
                'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.',
                'icon' => 'fa-slack'
            ],
            [
                'name' => 'User Experience',
                'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text.',
                'icon' => 'fa-users'
            ],
        ]);
    }
}

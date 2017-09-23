<?php

use Illuminate\Database\Seeder;

use App\Page;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::insert([
            [
                'name'   => 'home',
                'alias'  => 'home',
                'images' => 'main_device_image.png',
                'text'   => "<h2>We create <strong>awesome</strong> web templates</h2><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text  printer took a galley of type and scrambled it to make a type specimen.</p>"
            ],
            [
                'name'   => 'about us',
                'alias'  => 'aboutUs',
                'images' => 'about-img.jpg',
                'text'   => "<h3>Lorem Ipsum has been the industry\'s standard dummy text ever..</h3><br>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.PageMaker including versions of Lorem Ipsum.</p><br>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged like Aldus PageMaker including versions of Lorem Ipsum.</p>"
            ],
        ]);
    }
}

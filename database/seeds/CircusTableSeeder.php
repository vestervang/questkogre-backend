<?php

use Illuminate\Database\Seeder;

class CircusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filesystem = new Illuminate\Filesystem\Filesystem();

        $dirPath = storage_path('app/public/images/activities/circus');

        if(!$filesystem->isDirectory($dirPath)) {
            $filesystem->makeDirectory($dirPath, 0777, true, true);
        }

        $circusLocations = [
            [
                'location' => 'Tree Gnome Stronghold',
                'image'    => 'storage/images/misc/circus/1.jpg'
            ],
            [
                'location' => 'Seers\' Village',
                'image'    => 'storage/images/misc/circus/2.jpg'
            ],
            [
                'location' => 'Catherby',
                'image'    => 'storage/images/misc/circus/3.jpg'
            ],
            [
                'location' => 'Taverley',
                'image'    => 'storage/images/misc/circus/4.jpg'
            ],
            [
                'location' => 'Edgeville',
                'image'    => 'storage/images/misc/circus/5.jpg'
            ],
            [
                'location' => 'Falador',
                'image'    => 'storage/images/misc/circus/6.jpg'
            ],
            [
                'location' => 'Rimmington',
                'image'    => 'storage/images/misc/circus/7.jpg'
            ],
            [
                'location' => 'Draynor',
                'image'    => 'storage/images/misc/circus/8.jpg'
            ],
            [
                'location' => 'Al Kharid',
                'image'    => 'storage/images/misc/circus/9.jpg'
            ],
            [
                'location' => 'Lumbridge',
                'image'    => 'storage/images/misc/circus/10.jpg'
            ],
            [
                'location' => 'Lumber Yard',
                'image'    => 'storage/images/misc/circus/11.jpg'
            ],
            [
                'location' => 'Gertrude\'s',
                'image'    => 'storage/images/misc/circus/12.jpg'
            ]
        ];
        
        foreach ($circusLocations as $circusLocation) {

            factory(App\Circus::class)->create([
                'location'      => $circusLocation['location'],
            ]);
        }
    }
}

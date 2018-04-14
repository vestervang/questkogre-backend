<?php

use Illuminate\Database\Seeder;

class NavigationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $navigationItems = [
            [
                'link' => 'news',
                'text' => 'Forside.',
            ],
            [
                'link' => 'dashboard',
                'text' => 'Guides.',
            ],
            [
                'link' => 'heroes',
                'text' => 'Andet.',
            ],
            [
                'link' => 'dashboard',
                'text' => 'Fællesskab.'
            ],
            [
                'link' => 'dashboard',
                'text' => 'Forum.'
            ],
            [
                'link'      => 'test',
                'text'      => 'Byen / områder',
                'parent_id' => 2
            ],
            [
                'link'      => 'test',
                'text'      => 'Distraction & Diversions',
                'parent_id' => 2
            ],
            [
                'link'      => 'test',
                'text'      => 'Guilds',
                'parent_id' => 2
            ],
            [
                'link'      => 'test',
                'text'      => 'Kort',
                'parent_id' => 2
            ],
            [
                'link'      => 'test',
                'text'      => 'Minigames',
                'parent_id' => 2
            ],
            [
                'link'      => '/guides/skills',
                'text'      => 'Skills',
                'parent_id' => 2
            ],
            [
                'link'      => 'test',
                'text'      => 'Særlige opgaver',
                'parent_id' => 2
            ],
            [
                'link'      => 'test',
                'text'      => 'Opgaver',
                'parent_id' => 2
            ],
            [
                'link'      => 'calculators/combat',
                'text'      => 'Combat level',
                'parent_id' => 3
            ],
        ];

        foreach ($navigationItems as $navigationItem) {
            \App\NavigationItem::create($navigationItem);
        }
    }
}

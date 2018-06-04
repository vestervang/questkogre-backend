<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seeded users.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $users;

    /**
     * User created news articles.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $newsArticles;

    protected $seeds = [
        'users',
        'newsArticles',
        'newsArticleComments',
        'circuses',
        'skills',
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->seeds as $seed) {
            $this->command->line("Processing: {$seed}");
            call_user_func([$this, $seed]);
        }
    }

    public function users()
    {
        $this->users           = factory(\App\Models\User::class, 10)->create();
        $this->users[0]->email = 'admin@admin.com';
        $this->users[0]->save();

        $this->command->line('Seeded users');
    }

    public function newsArticles()
    {
        $this->newsArticles = collect();

        $this->users->each(function (\App\Models\User $user) {
            $data = [
                'user_id' => $user->id,
            ];

            factory(App\Models\NewsArticle::class, rand(0, 25))->create($data)->each(function (\App\Models\NewsArticle $article) {
                $this->newsArticles->push($article);
            });
        });

        $this->command->line('Seeded news articles');
    }

    public function newsArticleComments()
    {

        $this->newsArticles->each(function (\App\Models\NewsArticle $article) {
            $users        = $this->users->all();
            $randomUserId = rand(1, count($users));

            $data = [
                'news_article_id' => $article->id,
                'user_id'         => $randomUserId,
            ];

            factory(\App\Models\NewsArticleComment::class, rand(0, 50))->create($data)->each(function (\App\Models\NewsArticleComment $comment) {
            });

        });

        $this->command->line('Seeded news article comments');
    }

    public function circuses()
    {

        $filesystem = new Illuminate\Filesystem\Filesystem();

        $dirPath = storage_path('app/public/images/activities/circus');

        $filesystem->deleteDirectory($dirPath);

        if (!$filesystem->isDirectory($dirPath)) {
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

            factory(App\Models\Circus::class)->create([
                'location' => $circusLocation['location'],
            ]);
        }

        $this->command->line('Seeded circuses');
    }

    public function skills()
    {

        $filesystem = new Illuminate\Filesystem\Filesystem();

        $dirPath = storage_path('app/public/images/skills');

        $filesystem->deleteDirectory($dirPath);

        if (!$filesystem->isDirectory($dirPath)) {
            $filesystem->makeDirectory($dirPath, 0777, true, true);
        }

        $skills = new \vestervang\rsApi\RS3\Skills\SkillRepository();

        for($i = 0; $i < $skills->count(); $i++){

            $skill = $skills->getById($i);

            factory(App\Models\Skill::class)->create([
                'name'      => $skill->getName(),
                'max_level' => $skill->getMaximumLevel(),
                'member'    => $skill->isMembers(),
            ]);
        }

        $this->command->line('Seeded skills');
    }
}

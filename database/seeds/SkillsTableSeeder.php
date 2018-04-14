<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filesystem = new Illuminate\Filesystem\Filesystem();

        $dirPath = storage_path('app/public/images/skills');

        if(!$filesystem->isDirectory($dirPath)) {
            $filesystem->makeDirectory($dirPath, 0777, true, true);
        }

        $skills = new \vestervang\rsApi\RS3\Skills\SkillRepository();
        for ($i = 0; $i < $skills->count(); $i++) {

            $skill = $skills->getSkill($i);

            factory(App\Skill::class)->create([
                'name'      => $skill->getName(),
                'max_level' => $skill->getMaximumLevel(),
                'member'    => $skill->isMembers(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) {
            $project = new Project();
            $project->name = $faker->words(3, true);
            $project->slug = Str::slug($project->name. '-');
            $project->repository_link = $faker->url;
            $project->description = $faker->paragraph;
            $project->date_start = $faker->date;
            $project->date_end = $faker->date;
            $project->img = $faker->imageUrl();

            $project->save();
        }
    }
}

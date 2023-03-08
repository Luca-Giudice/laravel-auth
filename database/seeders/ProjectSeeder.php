<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 5; $i++){
            $project = new Project();
            $project->title = $faker->text(20);
            $project->content = $faker->paragraph(2, true);
            $project->image = $faker->imageUrl(250, 250);
            $project->link = $faker->url();
            $project->slug = Str::slug($project->title, '-');

            $project->save();
        }
    }
}

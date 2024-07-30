<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = config('projects');

        foreach ($seeds as $seed) {

            $project = new Project();

            $project->type_id = rand(1, 6);
            $project->title = $seed['title'];
            $project->description = $seed['description'];
            $project->status = $seed['status'];
            $project->images = $seed['images'];
            $project->start_date = $seed['start_date'];
            $project->end_date = $seed['end_date'];
            $project->slug = $seed['slug'];

            $project->save();
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all projects and technologies
        $projects = Project::all();
        $technologies = Technology::all();

        // Put random technologies each project
        foreach ($projects as $project) {
            //From 1 to 3 tecnologies each project
            $projectTechnologies = $technologies->random(rand(1, 3));
            $project->technologies()->attach($projectTechnologies);
        }
    }
}

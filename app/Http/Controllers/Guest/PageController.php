<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function projects()
    {
        $projects = Project::with('technologies')->get();

        return view('guest.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('guest.projects.show', compact('project'));
    }
}

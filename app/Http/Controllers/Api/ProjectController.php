<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::all();
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show(String $slug)
    {
        try {
            $project = Project::where('slug', $slug)->firstOrFail();
            return response()->json($project);
        } catch (ModelNotFoundException $e) { //ModelNotFoundException = When a model in not found in a database
            return response()->json(['error' => 'Project not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectStore;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $project = Project::first() ?? new Project();
        $projectstore = ProjectStore::all();

        return view('project', compact('project', 'projectstore'));
    }
}

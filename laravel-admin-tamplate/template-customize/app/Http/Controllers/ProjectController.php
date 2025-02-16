<?php

namespace App\Http\Controllers;
use App\Models\Deployment;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index () {
        $project = Project::with('deployments')->get();//has-many-through

        // return $project;

        return view('pages.has-many-through.project', compact('project'));
    }
}

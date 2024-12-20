<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller {
    // Index
    public function index() {
        $projects_list = Project::with('type', 'technologies')->get();
        return response()->json([
            'success' => true,
            'results' => $projects_list
        ]);
    }
}

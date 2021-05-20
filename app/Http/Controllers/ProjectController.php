<?php

namespace App\Http\Controllers;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\User;

class ProjectController extends Controller
{
    public function getProjectById(Request $request, $id)
    {
        $project = Project::find($id);
        if (is_null($project)) {
            return response()->json(['message' => 'Project Not Found'], 404);
        }
        return response()->json($project::find($id), 200);
    }

    public function uploadProject(Request $request)
    {
        // $author = $request->input('author');
        // Log::info($author);

        if ($_FILES) {
            echo "working";
            exit();
        } else {
            echo "not working";
            exit();
        }

        // $project = Project::create($request->all());
        // return response($project, 201);

    }

    public function updateProject(Request $request, $id)
    {
        $project = Project::find($id);
        if (is_null($project)) {
            return response()->json(['message' => 'Project Not Found'], 404);
        }
        $project->update($request->all());
        return response($project, 200);
    }

    public function deleteProject(Request $request, $id)
    {
        $project = Project::find($id);
        if (is_null($project)) {
            return response()->json(['message' => 'Project Not Found'], 404);
        }
        $project->delete();
        return response()->json(null, 204);
    }
}

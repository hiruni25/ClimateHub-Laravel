<?php

namespace App\Http\Controllers;
use App\Project;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    //Upload project
    public function uploadProject(Request $request)
    {
        $project = new Project();
        $project = $request->all();
        try {
            $valid = true;
            if(!isset($project['project_title'])) $valid = false;
            else {
                if(trim($project['project_title']) == "") $valid = false;
            }
            if(!isset($project['accessible'])) $valid = false;
            else {
                if(trim($project['accessible']) == "") $valid = false;
                else {
                    if(trim($project['accessible']) == "open") $project['accessible'] = 1;
                    else $project['accessible'] = 0;
                }
            }
            if(!$valid) {
                return response()->json(['message'=>'Not validated entity'],422);
            } else {
                $project['admin_id'] = 1; // set admin id
                $project['version_id'] = 1; // first version
                $project = Project::create($project);
                return response()->json(['message'=>'Added new project successfully!'],200);
            }
        } catch(Exception $e) {
            return response($e,500); // unknown exception
        }
    }

    //Update project
    public function updateProject(Request $request)
    {
        $project = new Project();
        $project = $request->all();

        try {
             $valid = true;

             if(!isset($project['accessible'])) $valid = false;
             else {
                 $project['accessible'] = 1;
             }

             if(!$valid) {
                  return response()->json(['message'=>'Not validated entity'],422);
             } else {
                  $project['admin_id'] = 1; // set admin id
                  $project['version_id'] = $project['version_id'] + 1; // first version
                  $project->update($project);
                  return response()->json(['message'=>'Updated project successfully!'],200);
             }

        } catch(Exception $e) {
            return response($e,500); // unknown exception
        }
    }

    //Delete Project
    public function deleteProject(Request $request, $id)
    {
        $project = Project::find($id);
        if (is_null($project)) {
            return response()->json(['message' => 'Project Not Found'], 404);
        }
        $project->delete();
        return response()->json("Project Deleted Successfully!", 200);
    }

    //Get project by project id
    public function getProjectById(Request $request, $id)
    {
        $project = Project::find($id);
        if (is_null($project)) {
            return response()->json(['message' => 'Project Not Found'], 404);
        }
        return response()->json($project::find($id), 200);
    }

    //Get Project List
    public function getProjectsList()
    {
        $project = Project::get();
        return response()->json($project, 200);
    }

    //Get All projects
    public function getAllProjects()
    {
        $project = project::get()->toJson(JSON_PRETTY_PRINT);
        return response($project, 200);
    }

    //Get All public projects which belongs to category project
    public function getPublicProjects()
    {
        $project=DB::table('projects')
        ->where([['accessible','=','1'],['category','=','project']])
        ->get()->toJson(JSON_PRETTY_PRINT);
        return response($project,200);
    }

    //Get All private projects  which belongs to category project
    public function getPrivateProjects()
    {
        $project=DB::table('projects')
        ->where([['accessible','=','0'],['category','=','project']])
        ->get()->toJson(JSON_PRETTY_PRINT);
        return response($project,200);
    }

    //Get All public projects which belongs to category ToolBox
    public function getPublicToolbox()
     {
         $project=DB::table('projects')
         ->where([['accessible','=','1'],['category','=','toolbox']])
         ->get()->toJson(JSON_PRETTY_PRINT);
         return response($project,200);
     }

    //Get All private projects  which belongs to category ToolBox
    public function getPrivateToolbox()
    {
         $project=DB::table('projects')
         ->where([['accessible','=','0'],['category','=','toolbox']])
         ->get()->toJson(JSON_PRETTY_PRINT);
         return response($project,200);
     }

    //Get All public projects which belongs to category  Additives
    public function getPublicAdditives()
      {
          $project=DB::table('projects')
          ->where([['accessible','=','1'],['category','=','additives']])
          ->get()->toJson(JSON_PRETTY_PRINT);
          return response($project,200);
      }

    //Get All private projects  which belongs to category Additives
    public function getPrivateAdditives()
      {
          $project=DB::table('projects')
          ->where([['accessible','=','0'],['category','=','additives']])
          ->get()->toJson(JSON_PRETTY_PRINT);
          return response($project,200);
      }

    //Get 5 latest Public projects
    public function getLatestPublicProjects()
    {
        $project=DB::table('projects')
        ->where([['accessible','=','1'],['category','=','project']])
        ->take(6)
        ->orderBy('id', 'desc')
        ->get()->toJson(JSON_PRETTY_PRINT);
        return response($project,200);
    }

}

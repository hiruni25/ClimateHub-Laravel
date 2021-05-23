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



        try {

            if ($request->hasFile("project_file")){
                    $file = $request->file('project_file');
                    $name = 'public/' . time() . '.' . $file->getClientOriginalExtension();
                    //$imageFileName = $request->file("img_file")->getClientOriginalName();
                    $path = $file->storeAs('public/Projects/', $name);
                    $request['project_file'] = $path;   
            
                }

            if ($request->hasFile("img_file")){
                    $file = $request->file('img_file');
                    $name = 'public/' . time() . '.' . $file->getClientOriginalExtension();
                    // $imageFileName = $request->file("img_file")->getClientOriginalName();
                    $path = $file->storeAs('public/Projects/', $name);
                    $request['img_file'] = $path;
                }

            $project = Project::create($request->all());
            return response($project, 201);

            

            //dd($request->all());
            //$author = $request->input('authorabc');
            
            //if ($request->hasFile("project_file")){
                //return response($author, 201);
                //return response("File is there", 201);
            //}
           
            //If the exception is thrown, this text will not be shown
            //echo $author;
                

          }
          
          //catch exception
          catch(Exception $e) {
            echo 'Message: ' .$e;
          }
    //    $author = $request->input('author');
    //    Log::info($author);

//        if ($_FILES) {
//            echo "working";
//            exit();
//        } else {
//            echo "not working";
//            exit();
//        }

        // $project = Project::create($request->all());
        // return response("project", 201);

        // $project = new Project;
        //
        // if($project->save())
        // {
        //     return ["status" => true, "message" => "Project Uploaded Successfully"];
        // }else
        // {
        //     return ["status" => false, "message" => "Something Went Wrong"];
        // }

    }

    //Update project
    public function updateProject(Request $request, $id)
    {
        $project = Project::find($id);
        if (is_null($project)) {
            return response()->json(['message' => 'Project Not Found'], 404);
        }
        $project->update($request->all());
        return response($project, 200);
    }

    //Delete Project
    public function deleteProject(Request $request, $id)
    {
        $project = Project::find($id);
        if (is_null($project)) {
            return response()->json(['message' => 'Project Not Found'], 404);
        }
        $project->delete();
        return response()->json(null, 204);
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
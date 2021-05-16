<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;

class ProjectController extends Controller
{
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

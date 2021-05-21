<?php

namespace App\Http\Controllers;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'version_id'=>'required',   
            'project_title'=>'required',
            'author' => 'required',
            'organisation' => 'required',
            'abstract' => 'required',
            'category'=>'required',
            'energy_strategy'=>'required',
            'bulding_scale'=>'required',
            'climate_zone'=>'required',
            'material'=>'required',
            'parameters'=>'required',
            'type_of_doc'=>'required',
            'mode_of_info'=>'required',
            'topic'=>'required',
            'world_region'=>'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'project_file'=>'required',
            'img_file'=>'required',
            'accessible'=>'required',
            'admin_id'=>'required'
        ]);

        $project = new Project([
            'version_id' => $request->get('version_id'),
            'project_title' => $request->get('project_title'),
            'author' => $request->get('author'),
            'organisation' => $request->get('organisation'),
            'abstract' => $request->get('abstract'),
            'category' => $request->get('category'),
            'energy_strategy' => $request->get('energy_strategy'),
            'bulding_scale' => $request->get('bulding_scale'),
            'climate_zone' => $request->get('climate_zone'),
            'material' => $request->get('material'),
            'parameters' => $request->get('parameters'),
            'type_of_doc' => $request->get('type_of_doc'),
            'mode_of_info' => $request->get('mode_of_info'),
            'topic' => $request->get('topic'),
            'world_region' => $request->get('world_region'),
            'longitude' => $request->get('longitude'),
            'latitude' => $request->get('latitude'),
            'project_file' => $request->get('project_file'),
            'img_file' => $request->get('img_file'),
            'accessible' => $request->get('accessible'),
            'admin_id' => $request->get('admin_id'),
        ]);
        $project->save();
        return redirect('/projects')->with('success', 'Project uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

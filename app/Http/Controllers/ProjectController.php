<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $auth = Auth::user();
        $projects = Project::
                    join('project_permissions','projects.id','=','project_permissions.project_id')
                    ->where('user_id','=',$auth->id)
                    ->get();
                    
        // return $projects;            
        // $query = Project::query();
        // $find = $request->search_data;
        // if($find){
        //     $projects = Project::where('projects.name','like','%'.$find.'%')
        //                         ->orWhere('projects.description','like','%'.$find."%")
        //                         ->join('versions','projects.id','=','versions.project_id')
        //                   ->join('tasks','versions.id','=','tasks.version_id')
        //                   ->where('tasks.user_id','=',$auth->id) 
        //                   ->get('projects.*')
        //                   ->unique('id') ;
        //     return view('project.index', ['projects'=>$projects]);
        // }
        // $projects = $query->join('versions','projects.id','=','versions.project_id')
        //                   ->join('tasks','versions.id','=','tasks.version_id')
        //                   ->where('tasks.user_id','=',$auth->id) 
        //                   ->get('projects.*')
        //                   ->unique('id') ;

        return view('project.index', ['projects'=>$projects]);
    }

    public function create()
    {
        return view('project.create');
    }
    
    public function store(Request $request)
    {
        $project = Project::create($request->all());

        return redirect()->route('projects.index')
                         ->with('upload-success', 'Upload Successfully');
    }
  
    public function show(string $id)
    {
        $project = Project::find($id);
        return view('project.detail',['project'=>$project]);
    }
    
    public function edit(string $id)
    {
        $project = Project::find($id);
        return view('project.edit',['project'=>$project]);
    }
   
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);
        $project->update($request->all());  
        
        return redirect()->route('projects.index')
                         ->with('update-success', 'Update Successfully');
    }
   
    public function destroy(string $id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect()->route('projects.index')
                         ->with('delete-success', 'Delete Successfully');

    }
}

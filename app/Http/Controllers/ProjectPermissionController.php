<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Project;
use App\Models\ProjectPermission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectPermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $project_permission = Project::
                                     join('project_permissions','projects.id','=','project_permissions.project_id')
                                     ->get();
                                     
        // return $project_permission;                                   
        $project_permission = ProjectPermission::
                  join('projects','projects.id','=','project_permissions.project_id')
                ->join('users','users.id','=','project_permissions.user_id')
                ->select('projects.name as pname','users.name as uname','projects.id as id')
                // groupBy('project_id')
                ->get();

        $projects = Project::select('id','name')->get();
        $users = User::select('id','name')->where('user_type','=','employee')->get();
        $departments = Department::select('id','name')->get();
        return view('project_permission.index', compact('projects','users','departments','project_permission'));
    }

    public function create()
    {
        //
    }
   
    public function store(Request $request)
    {
        $project_id = $request->project_id;
        foreach($project_id as $p_id)
        {
            DB::table('project_permissions')->insert([
                'project_id' => $p_id,
                'user_id' => $request->user_id
            ]);
        }
        
        return back()->with('upload-success','Upload Successfully!');
    }
  
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }
  
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $project_permission = ProjectPermission::find($id);
        $project_permission->delete();

        return back()->with('delete-success','Delete Successfully!');
    }
}

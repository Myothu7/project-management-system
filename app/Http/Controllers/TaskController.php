<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\Version;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {   
        $tasks = Task::where('version_id','=',$request->version_id)->whereNull('parent_id')->get();
        // $child_tasks = Task::where('version_id','=',$request->version_id)->whereNotNull('parent_id')->get();
        $version = Version::find($request->version_id);
        $project_name = Project::find($request->project_id);
        $child_tasks = Task::where('version_id','=',$request->version_id)
                            ->whereNotNull('parent_id')
                            ->join('users','tasks.user_id','=','users.id')
                            ->select('users.name as user_name','users.id as user_id','tasks.parent_id','tasks.name','tasks.status')
                            ->get();
        $flag = 1;
        foreach($child_tasks as $val){
            if($val->status == '1' || $val->status == '2'){
                $flag = 0;
            }
        }
        
        return view('tasks.index',compact('version','tasks','child_tasks','project_name','flag'));
    }
   
    public function create(Request $request)
    {
        //
    }
    
    public function store(Request $request)
    {
        Task::create($request->all());
        return back()->with('upload-success', 'Upload Successfully!');  
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
        $task = Task::find($id);
        $task->update($request->all());
        return back()->with('update-success', 'Update Successfully!');
    }

    public function destroy(string $id)
    {
        $task = Task::where('id',$id)
                    ->orWhere('parent_id','=',$id)->delete();
        return back()->with('delete-success', 'Delete Successfully!');                     
    }
}



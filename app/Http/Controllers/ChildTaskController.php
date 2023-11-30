<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ChildTaskController extends Controller
{
    private $task_id;
    private $flag = 0;
    public function index(Request $request)
    {
        $child_tasks = Task::where('parent_id','=',$request->task_id)->get();

        $task = Task::find($request->task_id);
        // dd($this->flag);
       

        $developers = DB::table('version_departments')
                    ->where('version_id','=',$request->version_id)
                    ->join('departments','version_departments.department_id','=','departments.id')
                    ->join('employees','version_departments.department_id','=','employees.department_id')
                    ->join('users','employees.user_id','=','users.id')
                    ->select('version_departments.*', 'departments.name','users.name','employees.user_id')
                    ->get();

        // return $developers;
        // return $child_tasks;
        return view('child_task.index', compact('child_tasks','task','developers'));
    }
   
    public function create()
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
        // dd($request->all());
        $task = Task::find($id);
        Session::put('task_id', $task->parent_id);
        $task_id = Session::get('task_id');

        $task->update($request->all());

        // return $value;
        // if($request->status != '3'){
        //     Task::find($this->task_id)->update(['status'=>'2']);
        // }
        // $this->task_id = $request->task_id;
        $flag = 1;
        $child_tasks = Task::where('parent_id','=',$task_id)->get();
        foreach($child_tasks as $val){
            if($val->status == '1' || $val->status == '2'){
                $flag = 0;
            }
        }
        // dd($flag);
        if($flag){
            Task::find($task_id)->update(['status'=>'3']);
            Session::forget('task_id');
        }
        else{
            Task::find($task_id)->update(['status'=>'2']);
            Session::forget('task_id');
        }
        // dd($this->flag);
        return back()->with('update-success', 'Update Successfully!'); 
    }
  
    public function destroy(string $id)
    {
        Task::find($id)->delete();
        return back()->with('delete-success', 'Delete Successfully!'); 
    }
}

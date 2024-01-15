<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Version;
use Illuminate\Support\Facades\DB;

class VersionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // $usersWithPostsAndComments = User::select('users.*', 'posts.title as post_title', 'comments.text as comment_text')
    // ->join('posts', 'users.id', '=', 'posts.user_id')
    // ->join('comments', 'posts.id', '=', 'comments.post_id')
    // ->get();

    public function index(Request $request)
    {
        $id = $request->project_id;
        $project = Project::find($id);
        $version = Version::where('project_id','=',$id)->get();
        
        $asign_deparments = Version::where('project_id','=',$id)
                           ->join('version_departments', 'versions.id','=','version_departments.version_id')
                           ->join('departments','version_departments.department_id','=','departments.id')
                           ->get(); 
                           
        // return $asign_deparments;                   
        $departments = Department::all();
        return view('version.index',
                [
                'project'=>$project,
                "version" => $version,
                'departments'=>$departments,
                'asign_deparments' => $asign_deparments
                ]
    );
    }
  
    public function create($id)
    {
        // 
    }
    
    public function store(Request $request)
    {  
        $version = Version::where('project_id','=',$request->project_id)->get();
        $flag = 0;
        foreach($version as $v){
            if($v->version_number == $request->version_number){
                $flag = 1;
            }
        }
        if($flag){
            return back()->with('version_number','This version have exist!');
        }
        
        $version = Version::create($request->all());

        $d_id= $request->department_id ;
        $data = [];
        foreach($d_id as $d){
            $data[] = ['version_id'=>$version->id, 'department_id'=>$d];
        }

        DB::table('version_departments')->insert($data);

        return back()->with('upload-success','Upload Successfully!');
    }

    public function edit(string $id)
    {
        //
    }
    
    public function update(Request $request, string $id)
    {
        $version = Version::find($id);
        $version->update($request->all());

        return back()->with('update-success','Update Successfully!');
    }
    
    public function destroy(string $id)
    {
        $version = Version::find($id);
        $version->delete();

        return back()->with('delete-success','Delete Successfully!');
    }
}

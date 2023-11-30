<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'remark'
    ];

    public static function filter($searchTerm)
    {
        $filteredUsers = DB::table('departments')
                         ->where(function ($query) use ($searchTerm) {
                         $query->where('name', 'like', '%' . $searchTerm . '%')
                              ->orWhere('remark', 'like', '%' . $searchTerm . '%')
                              ->orWhere('id', 'like', '%' . $searchTerm . '%');
        });
        
        return $filteredUsers->get();
    }

    public function employee() 
    {
        return $this->hasMany(Employee::class);
    }
    
}

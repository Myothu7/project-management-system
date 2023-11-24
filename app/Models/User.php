<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
    
    public static function filter($searchTerm)
    {
        $filteredUsers = DB::table('users')
                        ->join('employees', 'employees.user_id', '=', 'users.id')   
                         ->where(function ($query) use ($searchTerm) {
                         $query->where('users.name', 'like', '%' . $searchTerm . '%')
                              ->orWhere('users.email', 'like', '%' . $searchTerm . '%')
                              ->orWhere('employees.role', 'like', '%' . $searchTerm . '%')
                              ->orWhere('employees.ph_number', 'like', '%' . $searchTerm . '%')
                              ->orWhere('employees.address', 'like', '%' . $searchTerm . '%')
                              ->where('users.user_type','=','employee');
        });
        
        return $filteredUsers->get();
    }

    public static function user_employee()
    {
        $data = DB::table('users')
                        ->leftJoin('employees', 'employees.user_id', '=', 'users.id')
                        ->where('users.user_type','=','employee')
                        ->select('users.*', 'employees.*')
                        // ->union(
                        //     DB::table('users')
                        //         ->rightJoin('employees', 'users.id', '=', 'employees.user_id')
                        //         ->select('users.*', 'employees.*')
                        // )
                        ->get();
        return $data;                
    }
}

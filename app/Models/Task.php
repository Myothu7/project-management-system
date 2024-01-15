<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['version_id','name','status','description','parent_id','user_id'];

    public function version()
    {
        return $this->belongsTo(Version::class);
    }

    // public function employee()
    // {
    //     return $this->hasOne(Employee::class);
    // }
}

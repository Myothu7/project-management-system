<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;
    protected $fillable = ['project_id','version_number','remark'];

    public function project()
    {
        return $this->hasOne(Project::class);
    }
    
}

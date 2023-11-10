<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $table = 'modules';
    protected $fillable = [
        'module_code',
        'name', 
        'note',
        'date_start',
        'project_id',
        'user_module',
    ];

    public function users() {
        return $this->belongsTo(User::class,'user_module');
    }

    public function projects() {
        return $this->belongsTo(Project::class,'project_id');
    }
    
    public function workitem(){
        return $this->hasMany(WorkItem::class, 'module_id');
    } 
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkItem extends Model
{
    use HasFactory;
    protected $table = 'work_items';
    protected $fillable = [
        'work_item_code',
        'name',
        'module_id',
        'project_id',
        'priority',
        'emp_workitem', 
        'note'

    ];

    public function projects() {
        return $this->belongsTo(Project::class,'project_id', 'id');
    }
    public function modules() {
        return $this->belongsTo(Module::class,'module_id', 'id');
    }

    public function users() {
        return $this->belongsTo(User::class,'emp_workitem', 'id');
    }

    public function workdo(){
        return $this->hasMany(WorkItem::class, 'work_item_id', 'id');
    }


}

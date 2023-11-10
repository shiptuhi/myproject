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

    public function project() {
        return $this->belongsTo(Project::class,'project_id');
    }
    public function module() {
        return $this->belongsTo(Module::class,'module_id');
    }

    public function users() {
        return $this->belongsTo(User::class,'emp_workitem');
    }

    public function workdo(){
        return $this->hasMany(WorkItem::class, 'work_do_id');
    }


}

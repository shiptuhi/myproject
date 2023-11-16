<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkDo extends Model
{
    use HasFactory;
    protected $table = 'work_dos';
    protected $fillable = [
        'work_do_code',
        'name',
        'module_id',
        'project_id',
        'work_item_id',
        'type_of_work',
        'priority',
        'emp_workdo', 
        'status',
        'note'

    ];

    public function projects() {
        return $this->belongsTo(Project::class,'project_id', 'id');
    }
    public function modules() {
        return $this->belongsTo(Module::class,'module_id', 'id');
    }

    public function work_items() {
        return $this->belongsTo(WorkItem::class,'work_item_id', 'id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'emp_workdo', 'id');
    }
}

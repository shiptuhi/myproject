<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

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
        'date_start',
        'date_end', 
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
    public function getDateStartAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function setDateStartAttribute($value)
    {
        $this->attributes['date_start'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function getDateEndAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function setDateEndAttribute($value)
    {
        $this->attributes['date_end'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = [
        'project_code',
        'name', 
        'active_status',
        'date_start',
        'date_end',
        'user_id',
        // 'customer_id',
        'note'
    ];

    public function module(){
        return $this->hasMany(Module::class, 'project_id', 'id');
    } 
    public function workitem(){
        return $this->hasMany(WorkItem::class, 'project_id','id');
    } 
    public function workdo(){
        return $this->hasMany(WorkDo::class, 'project_id','id');
    } 
    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // public function customers(){
    //     return $this->belongsTo(Customer::class, 'customer_id', 'id');
    // }


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

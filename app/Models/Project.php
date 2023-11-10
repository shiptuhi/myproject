<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany(Module::class, 'module_id');
    } 
    public function workitem(){
        return $this->hasMany(WorkItem::class, 'project_id');
    } 
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
//     public function customers(){
//         return $this->belongsTo(Customer::class, 'customer_id');
//     }
}

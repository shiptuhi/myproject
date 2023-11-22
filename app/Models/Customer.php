<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'name', 
        'username',
        'email',
        'phoneNumber',
        'company',
        'gender',
        'active_status',
        'note',
    ];

    // public function projects(){
    //     return $this->hasMany(Project::class, 'customer_id', 'id');
    // } 


}

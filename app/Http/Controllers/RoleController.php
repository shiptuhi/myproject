<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    //
    public function index(){
        $roles = Role::all()->pluck('name');
        Log::info($roles);
        return response()->json($roles);
    }
}

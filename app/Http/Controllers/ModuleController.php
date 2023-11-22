<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
      
    }
    public function index(){
        // $module = Module::all();
        $module = Module::with('projects','users')->get();

        return response()->json($module);
    }

    public function filter(Request $request){
        $query = Module::query();

        $searchInput = $request->input('input');
        $query->with('projects', 'users')->where(function ($subQuery) use ($searchInput) {
            $subQuery->where('id', $searchInput)
                ->orWhere('name', 'like', '%' . $searchInput . '%')
                ->orWhere('module_code', 'like', '%' . $searchInput . '%')
                ->orWhere(function ($s_query) use ($searchInput) {
                    $s_query->whereIn('user_module', function ($s2_query) use ($searchInput) {
                        $s2_query->select('id')->from('users')->where('name', 'like', '%' . $searchInput . '%');
                    });
                })
                ->orWhere(function ($s_query) use ($searchInput) {
                    $s_query->whereIn('project_id', function ($s2_query) use ($searchInput) {
                        $s2_query->select('id')->from('projects')->where('project_code', 'like', '%' . $searchInput . '%');
                    });
                })
                ;
            });
        $modules = $query->get();

        return response()->json($modules);
    }


    public function getModulesByProject($id){
        $modules = Module::where('project_id', $id)->get();
        return response()->json($modules);
    }

    public function store(Request $request){

        $rules = [
            'module_code' => 'required|string|max:255',
            'name' => 'required|max:255',
            'date_start' => 'nullable|date|date_format:d-m-Y',
            'project_id' => 'required|exists:projects,id',
            'user_module' => 'required|exists:users,id',
            'note' => 'max:255',
            
        ];

        $message = [
            'module_code.required' => 'Mã dự án là bắt buộc.',
            'name.required' => 'Tên dự án là bắt buộc.',
            'user_id.exists' => 'Nhân viên không tồn tại'
        ];

        $validator  = Validator::make($request->all(), $rules, $message);

        if($validator ->fails()){
            return response()->json(['error' => $validator->errors()], 404);
        }
        // Log::info($project);
        $module = Module::create(array_merge($validator->validated()));

        if(auth('api')->user()){
            return response()->json([
                'message' => 'Thêm module được thành công!',
                'module' => $module
            ], 201);
        } 
        abort(403, 'Unauthorized');   
    }


    public function edit($id) {
        $module = Module::findOrFail($id);
        return response()->json($module);
    }
    public function update(Request $request, $id){
        $module = Module::findOrFail($id);

        $rules = [
            'module_code'=> 'required|string|max:255',
            'name'=> 'required|max:255', 
            'note'=> 'max:255',
            'date_start' => 'date',
            'project_id' => 'required|exists:projects,id',
            'user_module'=> 'required|exists:users,id',
        ];
        $message = [
            'module_code.required'=> 'Mã module là bắt buộc.',
            'name.required' => 'Tên module là bắt buộc.',
            'project_id.exists' => 'Dự án không tồn tại',
            'user_module.exists' => 'Nhân viên không tồn tại'
        ];
        
        $validator  = Validator::make($request->all(), $rules, $message);

        if($validator ->fails()){
            return response()->json(['error' => $validator->errors()], 404);
        }
        $module->update(array_merge($validator->validated()));
        
        if(auth('api')->user()){
            return response()->json([
                'message' => 'Sửa module thành công!',
                'project' => $module
            ], 201);
        } 
        abort(403, 'Unauthorized');   
    }


    public function destroy($id){
        $module = Module::findOrFail($id);
        $module->delete();
        if(auth('api')->user()){
            return response()->json([
                'message'=> 'Xóa module thành công!!'
            ], 201);
        } 
        abort(403, 'Unauthorized'); 
    }

}

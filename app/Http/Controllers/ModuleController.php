<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
{
    //
    public function index(){
        // $module = Module::all();
        $module = Module::with('projects','users')->get();

        // return view('module.index',['module' => $module]);
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
        // $prj = Project::findOrfail($id);
        // $modules = $prj->modules;
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

        return response()->json([
            'message' => 'Module được thành công!',
            'project' => $module
        ], 201);


    }


    public function edit($id) {
        $module = Module::findOrFail($id);
        return response()->json($module);
    }
    public function update(Request $request, $id){
        $module = Module::findOrFail($id);

        $module->code = is_null($request->code) ? $module->code : $request->code;
        $module->name = is_null($request->name)? $module->name : $request->name;
        $module->project_id = is_null($request->project_id)? $module->project_id : $request->project_id;
        $module->note = is_null($request->note) ? $module->note: $request->note;
        
        $module->save();
        return redirect('/module')->with('success', 'Sửa module thành công!');
    }


    public function destroy($id){
        $module = Module::findOrFail($id);
        $module->delete();
        return response()->json([
            'message'=> 'Xóa module thành công!!'
        ]);
    }

}

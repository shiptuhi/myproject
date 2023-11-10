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

    public function create(){
        return view('module.create');
    }
    public function store(Request $request){

        $rules = [
            'module_code' => 'required|string|max:255',
            'name' => 'required|max:255',
            'date_start' => 'date',
            'project_id' => 'required|exists:projects,id',
            'user_module' => 'required|exists:users,id',
            'note' => 'max:255',
            
        ];

        $message = [
            'project_code.required' => 'Mã dự án là bắt buộc.',
            'name.required' => 'Tên dự án là bắt buộc.',
            'active_status.required'=> 'Trạng thái dự án là bắt buộc.',
            'user_id.exists' => 'Nhân viên không tồn tại'
        ];

        $validator  = Validator::make($request->all(), $rules, $message);

        if($validator ->fails()){
            return response()->json(['error' => $validator->errors()], 404);
        }
        // Log::info($project);
        $module = Module::create(array_merge($validator->validated(),
        ));

        return response()->json([
            'message' => 'Thêm module thành công!',
            'project' => $module
        ], 201);


    }


    public function edit($id) {
        $module = Module::findOrFail($id);
        return view('module.edit', ['module' => $module]);
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

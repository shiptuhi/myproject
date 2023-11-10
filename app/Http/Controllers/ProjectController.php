<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    //
    public function index(){
        $project = Project::with('users')->get();
        // $project = Project::take(10)->get();
        // return $project;
        // return view('project.index',['project' => $project]);
        return response()->json($project);
    }
    public function store(Request $request){

        $rules = [
            'project_code' => 'required|string|max:255',
            'name' => 'required|max:255',
            'active_status'=> 'required|in:Active,Inactive',
            'date_start' => 'date',
            'date_end' => 'date',
            'user_id' => 'required|exists:users,id',
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
        $project = Project::create(array_merge($validator->validated(),
        ));

        return response()->json([
            'message' => 'Project successfully registered',
            'project' => $project
        ], 201);
        // return redirect('/api/project')->with('success', 'Thêm dự án thành công!');
    }


    public function edit($id) {
        $project = Project::findOrFail($id);
        return response()->json([
            'message' => 'Project successfully registered',
            'project' => $project
        ], 201);
        // return view('project.edit', ['project' => $project]);
    }
    public function update(Request $request, $id){
        // $project = Project::findOrFail($id);

        // $project->code = is_null($request->code) ? $project->code : $request->code;
        // $project->name = is_null($request->name)? $project->name : $request->name;
        // $project->note = is_null($request->note) ? $project->note: $request->note;
        
        // $project->save();

        $rules = [
            'project_code' => 'required|string|max:255',
            'name' => 'required|max:255',
            'active_status'=> 'required|in:Active,Inactive',
            'date_start' => 'date',
            'date_end' => 'date',
            'note' => 'max:255',
        ];

        $message = [
            'project_code.required' => 'Mã dự án là bắt buộc.',
            'name.required' => 'Tên dự án là bắt buộc.',
            'active_status.required'=> 'Trạng thái dự án là bắt buộc.',
            'active_status.in' => 'Trạng thái dự án phải là "Active" hoặc "Inactive".',
        ];

        $validator  = Validator::make($request->all(), $rules, $message);
        if($validator ->fails()){
            return redirect()
                ->route('project.edit', $id)
                ->withErrors($validator)
                ->withInput();

            // return response()->json($validator->errors()->toJson(), 400);
        }
        return redirect('/project')->with('success', 'Sửa dự án thành công!');
    }


    public function destroy($id){
        $project = Project::findOrFail($id);
        $project->delete();
        return response()->json([
            'message'=> 'Xóa dự án thành công!!'
        ]);
        // return redirect('/project')->with('success', 'Xóa dự án thành công!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(){
        $project = Project::all();
        // $project = Project::take(10)->get();

        return view('project.index',['project' => $project]);
        // return response()->json($project);
    }

    public function create() {
        return view('project.create');
    }
    public function store(Request $request){

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
        ];

        $validator  = Validator::make($request->all(), $rules, $message);
        if($validator ->fails()){
            return redirect()
                ->route('project.create')
                ->withErrors($validator)
                ->withInput();
        }
 
        // $user = Project::create(array_merge(
        //             $validator->validated(),
        //         ));
 
        // return response()->json([
        //     'message' => 'User successfully registered',
        //     'user' => $user
        // ], 201);

        return redirect('/project')->with('success', 'Thêm dự án thành công!');
    }


    public function edit($id) {
        $project = Project::findOrFail($id);
        return view('project.edit', ['project' => $project]);
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
        return redirect('/project')->with('success', 'Xóa dự án thành công!');
    }
}

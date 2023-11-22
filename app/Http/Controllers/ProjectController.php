<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
      
    }

    public function index(){
        $project = Project::with('users')->get(); 
        return response()-> json($project);
    }

    public function filter(Request $request){
        $query = Project::query();

        $searchInput = $request->input('input');
        $query->with('users')->where(function ($subQuery) use ($searchInput) {
            $subQuery->where('id', $searchInput)
                ->orWhere('name', 'like', '%' . $searchInput . '%')
                ->orWhere('project_code', 'like', '%' . $searchInput . '%')
                ->orWhere(function ($s_query) use ($searchInput) {
                    $s_query->whereIn('user_id', function ($s2_query) use ($searchInput) {
                        $s2_query->select('id')->from('users')->where('name', 'like', '%' . $searchInput . '%');
                    });
                });
            });
        $projects = $query->get();

        return response()->json($projects);
    }
    public function store(Request $request){

        $rules = [
            'project_code' => 'required|string|max:255',
            'name' => 'required|max:255',
            'active_status'=> 'required|in:Active,Inactive',
            'date_start' => 'nullable|date|date_format:d-m-Y',
            'date_end' => 'nullable|date|date_format:d-m-Y',
            'user_id' => 'required|exists:users,id',
            'customer_id' => 'required|exists:customers,id',
            'note' => 'max:255',
            
        ];

        $message = [
            'project_code.required' => 'Mã dự án là bắt buộc.',
            'name.required' => 'Tên dự án là bắt buộc.',
            'user_id.exists' => 'Nhân viên không tồn tại',
            'customer_id.exists' => 'Khách hàng không tồn tại',
            'active_status.required'=> 'Trạng thái dự án là bắt buộc.',
            'active_status.in' => 'Trạng thái dự án phải là "Active" hoặc "Inactive".',
        ];

        $validator  = Validator::make($request->all(), $rules, $message);

        if($validator ->fails()){
            return response()->json(['error' => $validator->errors()], 404);
        }
        // Log::info($project);
        $project = Project::create(array_merge($validator->validated()));

        if(auth('api')->user()){
            return response()->json([
                'message' => 'Thêm dự án thành công!',
                'project' => $project
            ], 201);
        } 
        abort(403, 'Unauthorized');   
    }


    public function edit($id) {
        $project = Project::findOrFail($id);
        return response()->json($project);
    
    }
    public function update(Request $request, $id){
        $project = Project::findOrFail($id);

        $rules = [
            'project_code' => 'required|string|max:255',
            'name' => 'required|max:255',
            'active_status'=> 'required|in:Active,Inactive',
            'date_start' => 'date',
            'date_end' => 'date',
            'user_id' => 'required|exists:users,id',
            'customer_id' => 'required|exists:customers,id',
            'note' => 'max:255',
        ];
        $message = [
            'project_code.required' => 'Mã dự án là bắt buộc.',
            'name.required' => 'Tên dự án là bắt buộc.',
            'user_id.exists' => 'Nhân viên không tồn tại',
            'customer_id.exists' => 'Khách hàng không tồn tại',
            'active_status.required'=> 'Trạng thái dự án là bắt buộc.',
            'active_status.in' => 'Trạng thái dự án phải là "Active" hoặc "Inactive".',
        ]; 
        // $project->save();
        $validator  = Validator::make($request->all(), $rules, $message);
        if($validator ->fails()){
            return response()->json(['error' => $validator->errors()], 404);
        }
        $project->update(array_merge($validator->validated()));

        if(auth('api')->user()){
            return response()->json([
                'message' => 'Sửa dự án thành công!',
                'project' => $project
            ], 201);
        } 
        abort(403, 'Unauthorized');   
    }


    public function destroy($id){
        $project = Project::findOrFail($id);
        $project->delete();

        if(auth('api')->user()){
            return response()->json([
                'message'=> 'Xóa dự án thành công!!'
            ], 201);
        } 
        abort(403, 'Unauthorized');   
    }
}

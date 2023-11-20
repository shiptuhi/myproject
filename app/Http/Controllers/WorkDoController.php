<?php

namespace App\Http\Controllers;

use App\Models\WorkDo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkDoController extends Controller
{
    //
    // public function __construct() {
    //     $this->middleware('auth:api');
      
    // }
    public function index(){
        $workDo = WorkDo::with('work_items','modules','projects','users')->get();
        // if(auth('api')->user()){
        //     return response()-> json([
        //         'workDo' => $workDo,
        //     ]);
        // } 
        // abort(403, 'Unauthorized');
        return response()->json($workDo);
    }

    public function filter(Request $request){
        $query = WorkDo::query();
        
        $searchInput = $request->input('input');
        $query->with('work_items','modules', 'projects', 'users')->where(function ($subQuery) use ($searchInput) {
            $subQuery->where('id', $searchInput)
                ->orWhere('name', 'like', '%' . $searchInput . '%')
                ->orWhere('work_do_code', 'like', '%' . $searchInput . '%')
                ->orWhere('priority', 'like', '%' . $searchInput . '%')
                ->orWhere(function ($s_query) use ($searchInput) {
                    $s_query->whereIn('emp_workdo', function ($s2_query) use ($searchInput) {
                        $s2_query->select('id')->from('users')->where('name', 'like', '%' . $searchInput . '%');
                    });
                })
                ->orWhere(function ($s_query) use ($searchInput) {
                    $s_query->whereIn('project_id', function ($s2_query) use ($searchInput) {
                        $s2_query->select('id')->from('projects')->where('project_code', 'like', '%' . $searchInput . '%');
                    });
                })
                ->orWhere(function ($s_query) use ($searchInput) {
                    $s_query->whereIn('module_id', function ($s2_query) use ($searchInput) {
                        $s2_query->select('id')->from('modules')->where('module_code', 'like', '%' . $searchInput . '%');
                    });
                })
                ->orWhere(function ($s_query) use ($searchInput) {
                    $s_query->whereIn('work_item_id', function ($s2_query) use ($searchInput) {
                        $s2_query->select('id')->from('work_items')->where('work_item_code', 'like', '%' . $searchInput . '%');
                    });
                });
            });
        $workDo = $query->get();

        return response()->json($workDo);
    }

    public function store(Request $request){

        $rules = [
            'work_do_code' => 'required|string|max:255',
            'name' => 'required|max:255',
            'project_id' => 'required|exists:projects,id',
            'module_id' => 'required|exists:modules,id',
            'work_item_id' => 'required|exists:work_items,id',
            'emp_workdo' => 'required|exists:users,id',

            'priority' => 'required|in:Emergency,High,Medium,Low',
            'status' => 'required|in:Finish,Processing,Pause,Cancel',
            'type_of_work' => 'required|in:Complex,Simple',
            
            'note' => 'max:255',
            
        ];

        $message = [
            'work_do_code.required' => 'Mã công việc là bắt buộc.',
            'name.required' => 'Tên đầu mục là bắt buộc.',
            'priority.required'=> 'Trạng thái đầu mục là bắt buộc.',
            'work_item_id.exists' => 'Đầu mục không tồn tại',
            'project_id.exists' => 'Dự án không tồn tại',
            'module_id.exists' => 'Module không tồn tại',
            'user_id.exists' => 'Nhân viên không tồn tại'
        ];

       $validator  = Validator::make($request->all(), $rules, $message);

        if($validator ->fails()){
            return response()->json(['error' => $validator->errors()], 404);
        }
        $workDo = WorkDo::create(array_merge($validator->validated()));


        return response()->json([
            'message' => 'Công việc được tạo thành công',
            'Work Do' => $workDo
        ], 201);
    }


    public function edit($id) {
        $workDo = WorkDo::findOrFail($id);
        return response() -> json($workDo);
    }




    public function update(Request $request, $id){
        $workDo = WorkDo::findOrFail($id);

        $rules = [
            'work_do_code' => 'required|string|max:255',
            'name' => 'required|max:255',
            'project_id' => 'required|exists:projects,id',
            'module_id' => 'required|exists:modules,id',
            'work_item_id' => 'required|exists:workitems,id',
            'emp_workdo' => 'required|exists:users,id',
            'priority' => 'required|in:Emergency,High,Medium,Low',
            'status' => 'required|in:Finish,Processing,Pause,Cancel',
            'type_of_work' => 'required|in:Complex,Simple',
            'note' => 'max:255',
            
        ];

        $message = [
            'work_do_code.required' => 'Mã công việc là bắt buộc.',
            'name.required' => 'Tên đầu mục là bắt buộc.',
            'priority.required'=> 'Trạng thái đầu mục là bắt buộc.',
            'work_item_id.exists' => 'Đầu mục không tồn tại',
            'project_id.exists' => 'Dự án không tồn tại',
            'module_id.exists' => 'Module không tồn tại',
            'user_id.exists' => 'Nhân viên không tồn tại'
        ];

        $validator  = Validator::make($request->all(), $rules, $message);

        if($validator ->fails()){
            return response()->json(['error' => $validator->errors()], 404);
        }

        $workDo->update(array_merge($validator->validated()));
        return response()->json([
            'message' => 'Công việc được cập nhật thành công',
            'Work Do' => $workDo
        ], 201);
    }


    public function destroy($id){
        $workDo = WorkDo::findOrFail($id);
        $workDo->delete();
        return response()->json([
            'message'=> 'Xóa công việc thành công!!'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\WorkDo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkDoController extends Controller
{
    //
    public function index(){
        $workDo = WorkDo::with('workitems','modules','projects','users')->get();
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

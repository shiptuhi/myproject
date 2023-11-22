<?php

namespace App\Http\Controllers;

use App\Models\WorkDo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

class WorkDoController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth:api');
      
    }
    public function index(){
        $workDo = WorkDo::with('work_items','modules','projects','users')->get();
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
            'date_start' => 'nullable|date|date_format:d-m-Y',
            'date_end' => 'nullable|date|date_format:d-m-Y',
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
            'work_item_id' => 'required|exists:work_items,id',
            'emp_workdo' => 'required|exists:users,id',
            'priority' => 'required|in:Emergency,High,Medium,Low',
            'status' => 'required|in:Finish,Processing,Pause,Cancel',
            'type_of_work' => 'required|in:Complex,Simple',
            'date_start' => 'nullable|date|date_format:d-m-Y',
            'date_end' => 'nullable|date|date_format:d-m-Y',
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

    public function getTypeOfWork(){
        $type = WorkDo::select(
            DB::raw('SUM(CASE WHEN type_of_work = "Complex" THEN 1 ELSE 0 END) as type_0_count'),
            DB::raw('SUM(CASE WHEN type_of_work = "Simple" THEN 1 ELSE 0 END) as type_1_count'),
        )->first();
        
        $type0Count = $type->type_0_count;
        $type1Count = $type->type_1_count;

        return response()->json([$type0Count, $type1Count]);

    }
    public function getPriority(){
        $priority = WorkDo::select(
            DB::raw('SUM(CASE WHEN priority = "Emergency" THEN 1 ELSE 0 END) as type_0_count'),
            DB::raw('SUM(CASE WHEN priority = "High" THEN 1 ELSE 0 END) as type_1_count'),
            DB::raw('SUM(CASE WHEN priority = "Medium" THEN 1 ELSE 0 END) as type_2_count'),
            DB::raw('SUM(CASE WHEN priority = "Low" THEN 1 ELSE 0 END) as type_3_count'),
        )->first();
        
        $type0Count = $priority->type_0_count;
        $type1Count = $priority->type_1_count;
        $type2Count = $priority->type_2_count;
        $type3Count = $priority->type_3_count;

        return response()->json([$type0Count, $type1Count, $type2Count, $type3Count]);

        
    }
    public function getStatus(){
        $status = WorkDo::select(
            DB::raw('SUM(CASE WHEN status = "Finish" THEN 1 ELSE 0 END) as type_0_count'),
            DB::raw('SUM(CASE WHEN status = "Processing" THEN 1 ELSE 0 END) as type_1_count'),
            DB::raw('SUM(CASE WHEN status = "Pause" THEN 1 ELSE 0 END) as type_2_count'),
            DB::raw('SUM(CASE WHEN status = "Cancel" THEN 1 ELSE 0 END) as type_3_count'),
        )->first();
        
        // Access the results as properties
        $type0Count = $status->type_0_count;
        $type1Count = $status->type_1_count;
        $type2Count = $status->type_2_count;
        $type3Count = $status->type_3_count;

        return response()->json([$type0Count, $type1Count, $type2Count, $type3Count]);

        
    }
}

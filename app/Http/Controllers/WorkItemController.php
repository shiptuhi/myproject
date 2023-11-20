<?php

namespace App\Http\Controllers;

use App\Models\WorkItem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WorkItemController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth:api');
      
    }
    public function index(){
        $workitem = WorkItem::with('modules','projects','users')->get();
        return response()->json($workitem);
    }
    public function filter(Request $request){
        $query = WorkItem::query();

        $searchInput = $request->input('input');
        $query->with('modules', 'projects', 'users')->where(function ($subQuery) use ($searchInput) {
            $subQuery->where('id', $searchInput)
                ->orWhere('name', 'like', '%' . $searchInput . '%')
                ->orWhere('work_item_code', 'like', '%' . $searchInput . '%')
                ->orWhere(function ($s_query) use ($searchInput) {
                    $s_query->whereIn('emp_workitem', function ($s2_query) use ($searchInput) {
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
                });
            });
        $workItem = $query->get();

        return response()->json($workItem);
    }

    public function store(Request $request){

        $rules = [
            'work_item_code' => 'required|string|max:255',
            'name' => 'required|max:255',
            'project_id' => 'required|exists:projects,id',
            'module_id' => 'required|exists:modules,id',
            'emp_workitem' => 'required|exists:users,id',
            'priority' => 'required|in:Emergency,High,Medium,Low',
            // 'date_start' => 'date',
            'note' => 'max:255',
            
        ];

        $message = [
            'work_item_code.required' => 'Mã đầu mục là bắt buộc.',
            'name.required' => 'Tên đầu mục là bắt buộc.',
            'priority.required'=> 'Trạng thái đầu mục là bắt buộc.',
            'project_id.exists' => 'Dự án không tồn tại',
            'module_id.exists' => 'Module không tồn tại',
            'user_id.exists' => 'Nhân viên không tồn tại'
        ];

       $validator  = Validator::make($request->all(), $rules, $message);

        if($validator ->fails()){
            return response()->json(['error' => $validator->errors()], 404);
        }
        $workItem = WorkItem::create(array_merge($validator->validated()));
        // Log::info($project);


        return response()->json([
            'message' => 'Đầu mục được tạo thành công',
            'Work Item' => $workItem
        ], 201);
    }


    public function edit($id) {
        $workItem = WorkItem::findOrFail($id);
        return response() -> json($workItem);
    }


    public function update(Request $request, $id){
        $workItem = WorkItem::findOrFail($id);

        $rules = [
            'work_item_code' => 'required|string|max:255',
            'name' => 'required|max:255',
            'project_id' => 'required|exists:projects,id',
            'module_id' => 'required|exists:modules,id',
            'emp_workitem' => 'required|exists:users,id',
            'priority' => 'required|in:Emergency,High,Medium,Low',
            // 'date_start' => 'date',
            'note' => 'max:255',
            
        ];

        $message = [
            'work_item_code.required' => 'Mã đầu mục là bắt buộc.',
            'name.required' => 'Tên đầu mục là bắt buộc.',
            'priority.required'=> 'Trạng thái đầu mục là bắt buộc.',
            'project_id.exists' => 'Dự án không tồn tại',
            'module_id.exists' => 'Module không tồn tại',
            'user_id.exists' => 'Nhân viên không tồn tại'
        ];

        $validator  = Validator::make($request->all(), $rules, $message);

        if($validator ->fails()){
            return response()->json(['error' => $validator->errors()], 404);
        }
        $workItem->update(array_merge($validator->validated()));
        return response()->json([
            'message' => 'Đầu mục được cập nhật thành công',
            'Work Item' => $workItem
        ], 201);
    }


    public function destroy($id){
        $workItem = WorkItem::findOrFail($id);
        $workItem->delete();
        return response()->json([
            'message'=> 'Xóa đầu mục thành công!!'
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\WorkItem;
use Illuminate\Http\Request;

class WorkItemController extends Controller
{
    //
    public function index(){
        $workitem = WorkItem::with('modules','projects','users')->get();
        return response()->json($workitem);
        // return view('work_item.index',['workitem' => $workitem]);
    }

    public function store(Request $request){
        $workitem = new WorkItem;
        $workitem->work_item_code = $request->work_item_code;
        $workitem->name = $request->name;
        $workitem->module_id = $request->module_id;
        $workitem->project_id = $request->project_id;
        $workitem->priority = $request->priority;
        $workitem->emp_workitem = $request->emp_workitem;
        $workitem->note = $request->note;
        $workitem->save();

        return response()->json($workitem);

        // return redirect('/work_item')->with('success', 'Thêm dau muc thành công!');
    }


    public function edit($id) {
        $workitem = WorkItem::findOrFail($id);
        return view('work_item.edit', ['workitem' => $workitem]);
    }
    public function update(Request $request, $id){
        $workitem = WorkItem::findOrFail($id);

        $workitem->code = is_null($request->code) ? $workitem->code : $request->code;
        $workitem->name = is_null($request->name)? $workitem->name : $request->name;
        $workitem->module_id = is_null($request->module_id)? $workitem->module_id : $request->module_id;
        $workitem->project_id = is_null($request->project_id)? $workitem->project_id : $request->project_id;
        $workitem->priority = is_null($request->priority)? $workitem->priority : $request->priority;
        $workitem->emp_workitem = is_null($request->emp_workitem)? $workitem->emp_workitem : $request->emp_workitem;
        $workitem->note = is_null($request->note) ? $workitem->note: $request->note;
        
        $workitem->save();
        return redirect('/work_item')->with('success', 'Sửa đầu mục thành công!');
    }


    public function destroy($id){
        $workitem = WorkItem::findOrFail($id);
        $workitem->delete();
        return redirect('/work_item')->with('success', 'Xóa đầu mục thành công!');
    }

}

<form action="{{ route('work_item.update', $workitem->id) }}" method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <div>
        <label for="code">Mã đầu mục:</label>
        <input type="text" name="code" id="code" value="{{$workitem->code}}">
    </div>
    </br>
    <div>
        <label for="name">Tên đầu mục:</label>
        <input type="text" name="name" id="name" value="{{$workitem->name}}">
    </div>
    </br>
    <div>
        <label for="module_id">ID module:</label>
        <input type="text" name="module_id" id="module_id" value="{{$workitem->module_id}}">
    </div>
    </br>
    <div>
        <label for="project_id">ID dự án:</label>
        <input type="text" name="project_id" id="project_id" value="{{$workitem->project_id}}">
    </div>
    </br>
    <div>
        <label for="priority">Độ ưu tiên:</label>
        <input type="text" name="priority" id="priority" value="{{$workitem->priority}}">
    </div>
    </br>
    <div>
        <label for="emp_workitem">Nhân viên thực hiện:</label>
        <input type="text" name="emp_workitem" id="emp_workitem" value="{{$workitem->emp_workitem}}">
    </div>
    </br>
    <div>
        <label for="note">Ghi chú:</label>
        <input type="text" name="note" id="note" value="{{$workitem->note}}">
    </div>
    </br>
    <button type="submit">Insert</button>
    <a href="/work_item/">Return</a>
    
</form>

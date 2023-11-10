<form action="{{ route('work_item.store') }}" method="POST">
    {{ csrf_field() }}
    <div>
        <label for="code">Mã đầu mục:</label>
        <input type="text" name="code" id="code">
    </div>
    </br>
    <div>
        <label for="name">Tên đầu mục:</label>
        <input type="text" name="name" id="name">
    </div>
    </br>
    <div>
        <label for="module_id">ID module:</label>
        <input type="text" name="module_id" id="module_id">
    </div>
    </br>
    <div>
        <label for="project_id">ID dự án:</label>
        <input type="text" name="project_id" id="project_id">
    </div>
    </br>
    <div>
        <label for="priority">Độ ưu tiên:</label>
        <input type="text" name="priority" id="priority">
    </div>
    </br>
    <div>
        <label for="emp_workitem">Nhân viên thực hiện:</label>
        <input type="text" name="emp_workitem" id="emp_workitem">
    </div>
    </br>
    <div>
        <label for="note">Note:</label>
        <input type="text" name="note" id="note">
    </div>
    </br>
    <button type="submit">Insert</button>
    <a href="/work_item/">Return</a>
    
</form>

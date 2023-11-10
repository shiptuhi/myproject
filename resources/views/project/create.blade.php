<form action="{{ route('project.store') }}" method="POST">
    {{ csrf_field() }}
    <div>
        <label for="project_code">Mã dự án:</label>
        <input type="text" name="project_code" id="project_code">
    </div>
    </br>
    <div>
        <label for="name">Tên dự án:</label>
        <input type="text" name="name" id="name">
    </div>
    </br>
    <div>
        <label for="active_status">Trạng thái hoạt động:</label>
        <input type="text" name="active_status" id="active_status">
    </div>
    </br>
    <div>
        <label for="date_start">Ngày bắt đầu:</label>
        <input type="text" name="date_start" id="date_start">
    </div>
    </br>
    <div>
        <label for="date_end">Ngày kết thúc:</label>
        <input type="text" name="date_end" id="date_end">
    </div>
    </br>
    <div>
        <label for="note">Ghi chú::</label>
        <input type="text" name="note" id="note">
    </div>
    </br>
    <button type="submit">Insert</button>
    <a href="/project/">Return</a>
    
</form>

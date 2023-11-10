<form action="{{ route('project.update', $project->id) }}" method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <div>
        <label for="project_code">Mã dự án:</label>
        <input type="text" name="project_code" id="project_code" value="{{$project->project_code}}">
    </div>
    </br>
    <div>
        <label for="name">Tên dự án:</label>
        <input type="text" name="name" id="name" value="{{$project->name}}">
    </div>
    </br>
    <div>
        <label for="active_status">Trạng thái hoạt động:</label>
        <select name="active_status" id="active_status">
            <option value="Active">Hoạt động</option>
            <option value="Inactive">Không hoạt động</option>
        </select>
        <!-- <input type="text" name="active_status" id="active_status" value="{{$project->active_status}}"> -->
    </div>
    </br>
    <div>
        <label for="date_start">Ngày bắt đầu:</label>
        <input type="text" name="date_start" id="date_start" value="{{$project->date_start}}">
    </div>
    </br>
    <div>
        <label for="date_end">Ngày kết thúc:</label>
        <input type="text" name="date_end" id="date_end" value="{{$project->date_end}}">
    </div>
    </br>
    <div>
        <label for="note">Ghi chú:</label>
        <input type="text" name="note" id="note" value="{{$project->note}}">
    </div>
    <button type="submit">Update</button>
    <a href="/project/">Return</a>

</form>

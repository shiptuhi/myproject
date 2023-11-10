<form action="{{ route('module.update', $module->id) }}" method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <div>
        <label for="code">Mã module:</label>
        <input type="text" name="code" id="code" value="{{$module->code}}">
    </div>
    </br>
    <div>
        <label for="name">Tên module:</label>
        <input type="text" name="name" id="name" value="{{$module->name}}">
    </div>
    </br>
    <div>
        <label for="project_id">ID dự án:</label>
        <input type="text" name="project_id" id="project_id" value="{{$module->project_id}}">
    </div>
    </br>
    <div>
        <label for="note">Ghi chú:</label>
        <input type="text" name="note" id="note" value="{{$module->note}}">
    </div>
    </br>
    <button type="submit">Insert</button>
    <a href="/module/">Return</a>
    
</form>

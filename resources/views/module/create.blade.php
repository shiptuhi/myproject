<form action="{{ route('module.store') }}" method="POST">
    {{ csrf_field() }}
    <div>
        <label for="code">Mã module:</label>
        <input type="text" name="code" id="code">
    </div>
    </br>
    <div>
        <label for="name">Tên module:</label>
        <input type="text" name="name" id="name">
    </div>
    </br>
    <div>
        <label for="project_id">ID dự án:</label>
        <input type="text" name="project_id" id="project_id">
    </div>
    </br>
    <div>
        <label for="note">Note:</label>
        <input type="text" name="note" id="note">
    </div>
    </br>
    <button type="submit">Insert</button>
    <a href="/module/">Return</a>
    
</form>

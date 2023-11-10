<h1>Danh sách Module</h1>
<a href="/module/create/"> <button>Insert </button></a> <br>
<a href="/"> <button>HOMEPAGE </button></a> <br>  
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Mã Module</th>
            <th>Tên Module</th>
            <th>Tên Dự án</th>
            <th>Ghi chú</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($module as $mod)
            <tr>
                <td>{{ $mod->id }}</td>
                <td>{{ $mod->code }}</td>
                <td>{{ $mod->name }}</td>
                <td>{{ $mod->project->name}}</td>
                <td>{{ $mod->note }}</td>
                <td>
                    <a href="/module/update/{{ $mod->id }}"> <button>Update </button></a> <br> 
                    <a href="/module/delete/{{ $mod->id }}"><button>Delete </button></a>
                </td>
                
            </tr>
        @endforeach
    </tbody>
</table>
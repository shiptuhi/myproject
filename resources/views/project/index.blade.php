<h1>Danh sách dự án</h1>
<a href="/project/create/"> <button>Insert </button></a> <br> 
<a href="/"> <button>HOMEPAGE </button></a> <br> 
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Mã dự án</th>
            <th>Tên Dự án</th>
            <th>Ghi chú</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($project as $prj)
            <tr>
                <td>{{ $prj->id }}</td>
                <td>{{ $prj->project_code }}</td>
                <td>{{ $prj->name }}</td>
                <td>{{ $prj->note }}</td>
                <td>
                    <a href="/project/update/{{ $prj->id }}"> <button>Update </button></a> <br> 
                    <a href="/project/delete/{{ $prj->id }}"><button>Delete </button></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

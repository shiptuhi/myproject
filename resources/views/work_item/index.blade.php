<h1>Danh sách đầu mục</h1>
<a href="/work_item/create/"> <button>Insert </button></a> <br> 
<a href="/"> <button>HOMEPAGE </button></a> <br> 
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Mã Đầu Mục</th>
            <th>Tên Đầu Mục</th>
            <th>Tên Module</th>
            <th>Tên Dự án</th>
            <th>Độ ưu tiên</th>
            <th>Ngươì thực hiện</th>
            <th>Ghi chú</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($workitem as $wi)
            <tr>
                <td>{{ $wi->id }}</td>
                <td>{{ $wi->code }}</td>
                <td>{{ $wi->name }}</td>
                <td>{{ $wi->project->name}}</td>
                <td>{{ $wi->module->name}}</td>
                <td>{{ $wi->priority }}</td>
                <td>{{ $wi->emp_workitem}}</td>
                <td>{{ $wi->note }}</td>
                <td>
                    <a href="/work_item/update/{{ $wi->id }}"> <button>Update </button></a> <br> 
                    <a href="/work_item/delete/{{ $wi->id }}"><button>Delete </button></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

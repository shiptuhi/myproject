<h1>Danh sách nhân viên</h1>
<a href="/employee/create/"> <button>Insert </button></a> <br> 
<a href="/"> <button>HOMEPAGE </button></a> <br> 

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employee as $e)
            <tr>
                <td>{{ $e->id }}</td>
                <td>{{ $e->name }}</td>
                <td>{{ $e->email }}</td>
                <td>{{ $e->phoneNumber }}</td>
                <td>
                    <a href="/employee/update/{{ $e->id }}"> <button>Update </button></a> <br> 
                    <a href="/employee/delete/{{ $e->id }}"><button>Delete </button></a>
                <td>
            </tr>
        @endforeach
    </tbody>
</table>

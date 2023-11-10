<form action="{{ route('employee.update', $employee->id) }}" method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <div>
        <label for="name">Tên nhân viên:</label>
        <input type="text" name="name" id="name" value="{{$employee->name}}">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{$employee->email}}">
    </div>
    <div>
        <label for="phoneNumber">Số điện thoại:</label>
        <input type="text" name="phoneNumber" id="phoneNumber" value="{{$employee->phoneNumber}}">
    </div>
    <div>
        <label for="created_date">Ngày khởi tạo</label>
        <input type="text" name="created_date" id="created_date" value="{{$employee->created_date}}">
    </div>
    <button type="submit">Update</button>
    <a href="/employee/">Return</a>
</form>

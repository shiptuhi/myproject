<form action="{{ route('employee.store') }}" method="POST">
    {{ csrf_field() }}
    <div>
        <label for="name">Tên nhân viên:</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="phoneNumber">Số điện thoại:</label>
        <input type="text" name="phoneNumber" id="phoneNumber">
    </div>
    <div>
        <label for="created_date">Ngày khởi tạo</label>
        <input type="text" name="created_date" id="created_date">
    </div>
    <button type="submit">Insert</button>
    <a href="/employee/">Return</a>
</form>

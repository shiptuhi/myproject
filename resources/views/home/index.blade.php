<h1>HOMEPAGE</h1>
<form action="{{ route('user.login') }}" method="POST">
    {{ csrf_field() }}
    <div>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
    </div>
</br>
    <div>
        <label for="password">Password:</label>
        <input type="text" name="password" id="password">
    </div>
    <button type="submit">Sign in</button>
    
</form>


<div class="container mt-3">
    <h3>login</h3>
    <form action="{{route('auth.login')}}" method="POST">
        @csrf 
        Email : <input type="email" name="email" value="{{old('email')}}" required>  <i>admin@admin.com</i> <br>
        password : <input type="password" name="password" required> <i>admin</i><br>
        <div class="alert alert-danger">
            @error('email')
                {{$message}}   
            @enderror
        </div>
        <input type="submit" value="Login">

    </form>
</div>
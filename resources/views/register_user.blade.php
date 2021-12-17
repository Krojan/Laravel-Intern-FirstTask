<!DOCTYPE html>
<form action="/register" method="POST">
    @csrf
    <div class="container">
        <h1>Register</h1>

        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Your name" name="name" id="name" required>


        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" id="email" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>

        <button type="submit" class="registerbtn">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="{{route('login')}}">Sign in</a>.</p>
    </div>
</form>
</html>

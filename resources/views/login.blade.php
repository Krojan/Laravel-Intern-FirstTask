<!DOCTYPE html>
<form action="/login" method="POST">
    @csrf
    <div class="container">
        <h1>Login</h1>

        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" id="email" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>

        <button type="submit" class="registerbtn">Login</button>
    </div>

</form>
</html>

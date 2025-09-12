@extends("layout/login")
@section("form")
 <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">Login</button>
      <div class="links">
        <p><a href="#">Forgot Password?</a></p>
        <p>Don't have an account? <a href="/register">Sign Up</a></p>
      </div>
  @endsection
  @section('action', '/submit-login')
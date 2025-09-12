@extends("layout/login")
@section("form")
       <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      
      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>
      
      <div class="input-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required>
      </div>
      
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="input-group">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="passwordConfirm" required>
      </div>
      <button type="submit">Register</button>
      <div class="links">
        <p>have an account? <a href="/login">Login</a></p>
      </div>
  @endsection
  @section('action', '/submit-register')
  @section('headerText', 'Sign Up')
  @section('title', "Register Now")
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Login Page')</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-container">
    <h2>@yield('headerText', 'Login')</h2>
    <form action="@yield('action', '/login')" method="POST" enctype="@yield('enctype', 'multipart/form-data')">
<!--Adds an hidden input field that contains the csrf token to your-->
        @csrf
        @yield("form")
    </form>
  </div>
</body>
</html>

<!doctype htlm>
<head>
<title>Log in Your Blog</title>

<link href="reset.css" type="text/css" rel="stylesheet">
<link href="login.css" type="text/css" rel="stylesheet">
<meta charset="utf-8">
</head>

<body>
<div id = "formContainerLogIn">
  <div id = "formElementsLogIn">
    <div id = "formTitleLogIn">
      <h1> GUEST SIGN UP </h1>
    </div>
    <form action="login.php" id ="formLogin" method="post">
      <div class= "formFieldLogIn">
        <input type="text" name="usernameGuest" placeholder="Username" required>
      </div>
      <div class= "formFieldLogIn">
        <input type="email" name="emailGuest" placeholder="Email" required>
      </div>

      <div class= "formFieldLogIn">
        <input type="password" name="passwordGuest" placeholder="Password" required>
      </div>

      <div class= "formFieldLogIn">
        <input type="submit" name="signupGuest" value="Sign Up">
      </div>
    </form>
  </div>


  <div id= "guestContainer" >
      <div id = "guestField">
      <button type="button" onclick="document.location.href='login.html'"> Return Log In</button>
      </div>
  </div>

</div>
</body>


</html>

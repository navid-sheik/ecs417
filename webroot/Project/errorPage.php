<?php
session_start();
$guest = $_SESSION["guest"] ;
$userId =  $_SESSION["userId"];
$userAdmin = $_SESSION["admin"];
include 'conn.inc.php';
?>
<!doctype html>
<head>
  <link rel="stylesheet" href="error.css" type="text/css">
  <meta charset="utf-8">
   <meta name="viewport" content="initial-scale=1">
<head>
<body>
  <article id="errorMainFlex">
    <section id= "containerError">
      <div id="messageErrorDiv">
        <img src="errorImage.png" height="200px" width="200px">
        <h2> ERROR OCCURRED, PLEASE TRY AGAIN!</h2>
      </div>
      <div id ="buttonRedictPages">
        <button onclick="document.location.href='index.php'">Home</button>
        <button  onclick="document.location.href='viewblog.php'">Blog</button>
        <button  onclick="document.location.href='login.html'">Log In</button>
      </div>
    </section>
  </article>
</body>
</html>

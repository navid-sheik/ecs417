<?php
session_start();
echo $_SESSION["username"];

include 'conn.inc.php';
?>
<!doctype html>
<head>
  <link rel="stylesheet" href="index.css" type="text/css">
  <meta charset="utf-8">
  <meta http-equiv="refresh"  content="120">
   <meta name="viewport" content="initial-scale=1">
<head>
<body>
<div id = "mainflex">
  <header>
    <div id = 'title'>
      <span>My Portafolio</span>
    </div>
<?php
if (isset($_SESSION["username"])){
      echo "
    <nav>

      <ul>
        <li> <a href= '#'> Home </a> </li>
        <li> <a href= '#'> My Blog </a> </li>
        <li> <a href= '#'> My Details</a> </li>
        <li> <a href= '#'> My Portafolio</a> </li>
        <li> <a href='#'> Log out</a> </li>
      </ul>

    </nav>

  ";
}else
{
  echo "
<nav>

  <ul>
    <li> <a href= '#'> Home </a> </li>
    <li> <a href= '#'> Blog </a> </li>
    <li> <a href= '#'> Contact Me</a> </li>
    <li> <a href= '#'> Portafolio</a> </li>
    <li> <a href='login.html'> Log In</a> </li>
  </ul>

</nav>

";

}
?>
</header>

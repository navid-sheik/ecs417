<?php
session_start();
include 'conn.inc.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
  if (isset($_SESSION["admin"]))
  {
    if (isset($_GET['submitPost']))
    {
          $userId = $_SESSION['userId'];
           $title = $_GET['titlePost'];
           $content = $_GET['contentPost'];
           $title = stripcslashes($title);
           $content = stripcslashes($content);
           $title = mysqli_real_escape_string($conn,$title);
           $content = mysqli_real_escape_string($conn, $content);
           $sql = "INSERT INTO usersPosts(id, title, content, postDate) VALUES ('$userId', '$title', '$content', now())";
           $result = $conn->query($sql);
           if ($result == TRUE)
           {
              header('Location: viewblog.php');
              exit();
           }
           else
           {
              console.log("Error: " . $sql . "<br>" . $conn->error);
              header('Location: errorPage.php');
           }
    }
  }else{header('Location: index.php');
    exit();}
}else{header('Location: viewblog.php');}




?>

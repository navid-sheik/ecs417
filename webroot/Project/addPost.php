<?php
//This method will allow the  main user to add a post to the blog 
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
              echo "Error: " . $sql . "<br>" . $conn->error;

           }
    }
  }else{header('Location: index.php');
    exit();}
}else{header('Location: viewblog.php');}




?>

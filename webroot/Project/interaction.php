<?php
session_start();

include 'conn.inc.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
  if (isset($_GET["submitComment"]) )
  {
       if(isset($_SESSION["admin"]) || isset($_SESSION["guest"]))
       {
         $idUser =  $_SESSION["admin"];
         $commentText  =  $_GET["commentInput"];
         $idPost = $_GET ["postIdReference"];
         if(isset($_SESSION["guest"])){
           $idUser =  $_SESSION["guest"];
         }
         $commentText = stripcslashes($commentText);
         $commentText = mysqli_real_escape_string($conn,$commentText);
         $sql = "INSERT INTO postsInteraction(username, postId, comment, commentDate) VALUES ('$idUser', '$idPost', '$commentText', now())";
         $result = $conn->query($sql);
         if ($result === TRUE)
         {header('Location: viewblog.php');}
         else
         {   console.log("Error: " . $sql . "<br>" . $conn->error);
           header('Location: errorPage.php');
         }

      }else{ header('Location: login.html'); }

  }
}else{header('Location: viewblog.php');}

?>

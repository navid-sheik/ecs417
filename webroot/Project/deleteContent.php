<?php
session_start();
include 'conn.inc.php';
$guest = $_SESSION["guest"] ;
$userId =  $_SESSION["userId"];
$userAdmin = $_SESSION["admin"];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset($_POST["deleteOnePost"]) )
  {
     if(isset($_SESSION["admin"]))
     {
       $postIdToDelete = $_POST["postIdForDeletion"];
       $queryDeletePost = "DELETE FROM usersPosts WHERE postId = $postIdToDelete;";
       $resultDeleted = $conn->query($queryDeletePost);
       if ($resultDeleted === TRUE) {
        header('Location: viewblog.php');
        } else
        {
          console.log("Error deleting record: " . $queryDeletePost . "<br>" . $conn->error);
          header('Location: errorPage.php');

        }

    }else{ header("Location: login.html");}
  }



  if (isset($_POST["deleteOneComment"]) )
  {
     if(isset($_SESSION["admin"]))
     {
       $commentIdToDelete = $_POST["commentIdReference"];

       $queryDeleteComment= "DELETE FROM postsInteraction WHERE commentId = $commentIdToDelete;";
       $resultDeletedComment = $conn->query($queryDeleteComment);
       if ($resultDeletedComment === TRUE) {
        header('Location: viewblog.php');
        } else
        {
          console.log("Error deleting comment: " . $queryDeleteComment . "<br>" . $conn->error);
          header('Location: errorPage.php');
        }

    }else{ header("Location: login.html");}
  }

}else
{
  header('Location: viewblog.php');
}






?>

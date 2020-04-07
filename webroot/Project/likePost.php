<?php

session_start();

include 'conn.inc.php';
$guest = $_SESSION["guest"] ;
$userId =  $_SESSION["userId"];
$userAdmin = $_SESSION["admin"];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset($_POST["submitLikePost"]) )
{
   if(isset($_SESSION["admin"]) || isset($_SESSION["guest"]))
   {
     $idPost = $_POST["postIdLiked"];
     $queryLike = "SELECT userId, postId, isLiked FROM usersLikes WHERE userId='$userId' AND postId= $idPost";
     $resultUser = $conn->query($queryLike);
     $countUsers = $resultUser->num_rows;

     if ($countUsers  == 0 )
     {
       //INSERT QUERY

       $insertQuery= "INSERT INTO usersLikes (userId, postId, isLiked) VALUES ($userId, $idPost, 1)";
       $resultInsertion = $conn->query($insertQuery);

       if ($resultInsertion == TRUE)
       {
         header('Location: viewblog.php');
         exit();
       }else{
         console.log("Error: " . $insertQuery . "<br>" . $conn->error);
         header('Location: errorPage.php');
       }

     }
     else
     {
        //UPDATE QUERY
        $updateQuery= "UPDATE usersLikes SET isLiked = NOT isLiked WHERE userId='$userId' AND postId= $idPost;";
        $resultUpdate = $conn->query($updateQuery);
        if ($resultUpdate === TRUE)
        {
          header('Location: viewblog.php');
          exit();
        }else{
          console.log("Error: " . $updateQuery . "<br>" . $conn->error);
          header('Location: errorPage.php');
        }
     }
   }else{header('Location: login.html');}
}
}else
{
  header('Location: viewblog.php');
}





?>

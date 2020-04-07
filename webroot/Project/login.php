<?php
session_start();
include 'conn.inc.php';

if (isset($_POST['login']))
{
       $email = $_POST['email'];
       $password =$_POST['password'];
       $email = stripcslashes($email);
       $password = stripcslashes($password);
       $email = mysqli_real_escape_string($conn,$email);
       $password = mysqli_real_escape_string($conn,$password);
       $sql = "SELECT id, username, userPassword,userEmail, isAdmin FROM users WHERE userEmail='$email' AND userPassword='$password'";
       $result = $conn->query($sql);
       $countAdmin = $result->num_rows;
       $row = $result->fetch_assoc();
       $usernameLogged = $row["username"];
       $id = $row["id"];
       if($countAdmin == 1)
       {
         if ($id == 1)
         {
           unset($_SESSION["guest"]);
           $_SESSION["admin"] = $usernameLogged;
           $_SESSION["email"] = $email;
           $_SESSION["userId"] = $id;
         }else
        {
          unset($_SESSION["admin"]);
          $_SESSION["email"] = $email;
          $_SESSION["userId"] = $id;
          $_SESSION["guest"] = $usernameLogged;
       }
         header('Location: index.php');
         exit();
      }
      else
      {
        echo "<h1> Invalid Creditials Try Again </h1>";
        exit();
      }
  }




    if (isset($_POST['signupGuest']))
    {
      $usernameGuest = $_POST['usernameGuest'];
      $emailGuest = $_POST['emailGuest'];
      $passwordGuest =$_POST['passwordGuest'];

      $usernameGuest = stripcslashes($usernameGuest);
      $emailGuest = stripcslashes($emailGuest);
      $passwordGuest = stripcslashes($passwordGuest);

      $usernameGuest = mysqli_real_escape_string($conn,$usernameGuest);
      $emailGuest = mysqli_real_escape_string($conn,$emailGuest);
      $passwordGuest = mysqli_real_escape_string($conn,$passwordGuest);

      $query = "INSERT INTO users(username, userPassword,userEmail, isAdmin)  VALUES('$usernameGuest', '$passwordGuest', '$emailGuest','0')";

      $result = $conn->query($query);
      if ($result === TRUE)
      {


         header("Location: login.html");
      }
      else
      {
        echo "Error: " . $query . "<br>" . $conn->error;
        //header('Location: errorPage.php');
     }
    }




?>

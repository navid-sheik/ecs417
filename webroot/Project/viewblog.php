<?php
session_start();
$guest = $_SESSION["guest"] ;
$userId =  $_SESSION["userId"];
$userAdmin = $_SESSION["admin"];
include 'conn.inc.php';
?>

<!doctype html>

<head>
  <link rel="stylesheet" href="viewblog.css" type="text/css">
  <meta http-equiv="refresh" content="120">
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script type="text/javascript">
  function redictToLoginForm() {
    window.location = 'login.html';
  }

  function redictToLogout() {
    window.location = 'logout.php';
  }

  function redictToHome() {
    window.location = 'index.php';
  }

  function redictToAddPost() {
    window.location = 'addPost.html';
  }


  function checkIsNotEmpty() {
    var commentUser = document.forms["commentForm"]["commentInput"];
    if ((commentUser.value.length == 0)) {
      commentUser.style.border = "2px solid #DC143C";
      return false;
    }
  }

  function toggleComment(key) {
    var putItHere = "sectionComment" + key;
    var divToShow = document.getElementById(putItHere);
    if (divToShow.style.display === 'none') {
      divToShow.style.display = 'block';

    } else {
      divToShow.style.display = 'none';

    }

  }
</script>

<body>
  <header>
  
  </header>
  <!--***************************Main Part************************-->
  <div id="main">

    <!--Left Conetent-->
    <div id="left">
      <article id="postsContainer">
        <div id="sectionContainer">
          <div class="dropdownDiv">
            <button class="dropDownButton">Month
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <form method="post">
                <button type="submit" name="group01">January </button>
                <button type="submit" name="group02">February</button>
                <button type="submit" name="group03">March</button>
                <button type="submit" name="group04">April</button>
                <button type="submit" name="group05">May</button>
                <button type="submit" name="group06">June</button>
                <button type="submit" name="group07">July</button>
                <button type="submit" name="group08">August</button>
                <button type="submit" name="group09">September</button>
                <button type="submit" name="group10">October</button>
                <button type="submit" name="group11">November</button>
                <button type="submit" name="group12">December</button>
              </form>
            </div>
          </div>
          <div class="dropdownDiv">
            <button class="dropDownButton">Sort By
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <form method="post">
                <button type="submit" name="sortByRecent">Recents </button>
                <button type="submit" name="sortByOldest">Oldest</button>
              </form>
            </div>
          </div>
        </div>
        <?php
        function queryMonth($monthNumber)
        {
          return  "SELECT id, postId, title ,content, postDate  FROM usersPosts WHERE id='1' AND  MONTH(postDate) = $monthNumber";
        }

        if (isset($_POST["sortByOldest"]))
        {
                $sql = "SELECT id, postId, title ,content, postDate FROM usersPosts WHERE id='1' ORDER BY postDate ASC";
        }else if (isset($_POST["sortByRecent"]))
        {
            $sql = "SELECT id, postId, title ,content, postDate FROM usersPosts WHERE id='1' ORDER BY postDate DESC";
        }else if(isset($_POST["group01"]))
        {
          $sql = queryMonth('1');
        }else if(isset($_POST["group02"]))
        {
          $sql = queryMonth('2');
        }else if(isset($_POST["group03"]))
        {
          $sql = queryMonth('3');
        }else if(isset($_POST["group04"]))
        {
          $sql = queryMonth('4');
        }else if(isset($_POST["group05"]))
        {
          $sql = queryMonth('5');
        }else if(isset($_POST["group06"]))
        {
          $sql = queryMonth('6');
        }else if(isset($_POST["group07"]))
        {
          $sql = queryMonth('7');
        }else if(isset($_POST["group08"]))
        {
          $sql = queryMonth('8');
        }else if(isset($_POST["group09"]))
        {
          $sql = queryMonth('9');
        }else if(isset($_POST["group10"]))
        {
          $sql = queryMonth('10');
        }else if(isset($_POST["group11"]))
        {
          $sql = queryMonth('11');
        }else if(isset($_POST["group12"]))
        {
          $sql = queryMonth('12');
        }
        else

        {
          $sql = "SELECT id, postId, title ,content, postDate FROM usersPosts WHERE id='1' ORDER BY postDate DESC";
        }
        $result = $conn->query($sql);
         if ($result->num_rows > 0)
         {
           while($row = $result->fetch_assoc())
           {
               $idUsername =  $row["id"];
               $postId = $row["postId"];
               $title = $row["title"];
               $content = $row["content"];
               $postDate = $row["postDate"];
              echo "
                          <section class= 'blogpost' id= '$postId'>
                         <div class='titleEntryPost'>
                         <div class='titlePostContent'
                           <h3>".  $title . "</h3>
                          </div>";

                          if (isset($userAdmin))
                          {
                            echo "
                            <div class ='deletePost'>
                            <form action = 'deleteContent.php' method = 'post'>
                              <input  type= 'hidden' name='postIdForDeletion' value = '$postId' >
                             <button type = 'submit' name= 'deleteOnePost'> <i class='fa fa-remove' style='font-size:18px;'></i></button>
                            </form>
                           </div>
                           ";
                         }

              echo"
                         </div>
                         <div class = 'contentEntryPost'>
                           <p>".$content. "</p>
                         </div>
                         <div class = 'dateEntryPost'>
                         <div class= 'displayLikeComments'>";
                         //Get the number of likes for each post
                         $myLikeQuery = "SELECT userId, postId, isLiked  FROM usersLikes WHERE postId='$postId' AND isLiked =1";
                         $resultLike = $conn->query($myLikeQuery);
                         $numberLikes = $resultLike->num_rows;
                         //Get the number of comment for each post
                         $myCommentsQuery = "SELECT username, postId, commentId,comment,likeUser,commentDate  FROM postsInteraction WHERE postId='$postId'";
                         $resultComments = $conn->query($myCommentsQuery);
                         $numberComments = $resultComments->num_rows;
                         echo"
                            <div class ='iconDipslay'> $numberLikes <i class='fa fa-thumbs-up' aria-hidden='true'></i></div>
                            <div class ='iconDipslay'> $numberComments <i class='fa fa-comments-o' aria-hidden='true'></i></div>
                          </div>
                          <div>
                           <p><i>".$postDate."</i></p>
                          </div>
                         </div>
                         <div class='commentSectionPost'>

                           <div class = 'buttonPostInteraction'>
                           <form class ='interactionPost' action = 'likePost.php' method='post'>
                              <input type ='hidden' name ='postIdLiked' value='$postId'>
                              ";
                              $queryGetLiked = "SELECT userId, postId, isLiked FROM usersLikes WHERE userId='$userId' AND postId= $postId";
                              $userLikedResult = $conn->query($queryGetLiked);
                              $recordNumber = $userLikedResult ->num_rows;

                              if ($recordNumber == 1)
                              {
                                $rowLike= $userLikedResult->fetch_assoc();
                                $checkIfLiked = $rowLike["isLiked"];

                                if ($checkIfLiked == 1)
                                {
                                  echo "  <button type='submit' name= 'submitLikePost'> UnLike</button>";
                                }else
                                {
                                    echo "  <button type='submit' name= 'submitLikePost'> Like</button>";
                                }


                              }else
                              {
                                  echo "  <button type='submit' name= 'submitLikePost'> Like </button>";
                              }



                              echo"

                              </form>
                              </div>

                              <div class = 'buttonPostInteraction' >";


                            echo "<button onclick='toggleComment($postId);'> Comments </i></button>
                           </div>
                         </div>
                         <div class= 'writeCommentForm'>
                         <form method= 'get' action='interaction.php' name='commentForm'>
                            <input type='text'  name= 'commentInput' placeholder = 'Add Comment...'>
                            <input  type= 'hidden' name='postIdReference' value = '$postId' >
                            <input type='submit' name= 'submitComment' value= 'Post' onclick='return checkIsNotEmpty()' >
                            </form>
                          </div>
                          <div class = 'commentsOtherUsers' id='sectionComment$postId' style='display : none'>";
                          $commentsQuery= "SELECT username, postId, commentId,comment, commentDate FROM postsInteraction WHERE postId = $postId ";
                          $resultComments = $conn->query($commentsQuery);
                          if ($resultComments->num_rows > 0)
                          {
                            while($rowComment = $resultComments->fetch_assoc())
                            {
                                $usernameCommeter =  $rowComment["username"];
                                $commentId = $rowComment["commentId"];
                                $commentContent = $rowComment["comment"];
                                $commentDate = $rowComment["commentDate"];
                            echo"
                            <div class = 'individualComment' id= '$commentId' >
                            <div class = 'mainCommentPart'>
                              <div class = 'usernameCommenter'>
                                <p><strong> $usernameCommeter  </strong></p>
                              </div>
                              <div class ='contentComment'>
                                  <p> $commentContent</p>
                              </div>";

                            if (isset($userAdmin)){
                              echo"
                              <div class ='deleteComment'>
                              <form action = 'deleteContent.php' method = 'post'>

                                <input type= 'hidden' name='commentIdReference' value ='$commentId'>
                                <button type = 'submit' name= 'deleteOneComment'> <i class='fa fa-remove' style='font-size:15px;'></i></button>
                                </form>
                              </div>";}
                          echo "
                            </div>
                              <div class = 'dateComment'>
                                <i>$commentDate</i>
                              </div>
                            </div>";
                          }//while loop of commments
                          echo "</div></section>";
                        }else
                        {echo
                          "</div>
                        </section>";
                      }
                    }//end while looop of posts
         }else
         {
           echo "
                    <section class= 'blogpost' id= 'emptyPost'>
                      <div class='titleEntryPost'>
                        <h3>NO POST AVAILABLE</h3>
                      </div>
                      <div class = 'contentEntryPost'>
                        <p>NO POST AVAILABLE</p>
                      </div>
                      <div class = 'dateEntryPost'>
                        <p><i> N/A</i></p>
                      </div>
                      <div class='commentSectionPost'>
                        <div class = 'buttonPostInteraction'>
                          <button> Comment</button>
                        </div>
                        <div class = 'buttonPostInteraction'>
                          <button> Like</button>
                        </div>
                      </div>
                      </section>
                      ";
            }
          ?>
      </article>
    </div>

    <div id="right">
      <?php
      if(isset($_SESSION["admin"]) )
      {
        echo "
      <aside class='welcomeUserSide'>
        Welcome ADMIN $userAdmin !
      </aside>";

      }else if (isset($_SESSION["guest"]))
      {
        echo "
      <aside class='welcomeUserSide'>
        Welcome GUEST $guest !
      </aside>";
      }
      ?>

      <aside class="side">
        <div id="titleAboutMeBlog">
          <h1> About Me </h1>
        </div>
        <div id="profileImageBlog">
          <figure>
            <img src="icon.png" alt="prfile" width="130px" height="130px">
            <figcaption>Sheikh Irfan Navid</figcaption>
          </figure>
        </div>

        <div id="shortParagraphBlog">
          <p> Having always been involved with technology, helped me realized that I wanted to be part of a
            company which embraces solving problems. I always strive to achieve the highest standard possible,
            without wasting time. </p>

        </div>

        <div id="extraInfoBlog">
          <p> <strong>Email</strong> : navidsheikh54@gmail.com</p>
          <p> <strong>Telephone</strong>: +447405241512</p>
        </div>


      </aside>
      <?php
      if(isset($_SESSION["admin"]) )
      {
        echo"
        <aside class= 'buttonContainer'>
          <button onclick='redictToAddPost()'> ADD POST</button>
        </aside>";
      }else if (isset($_SESSION["guest"]))
      {
          echo"
          <aside class= 'buttonContainer'>
            <button onclick='redictToAddPost()'> COMMENT</button>
          </aside>";
      }
      ?>
      <aside class="buttonContainer">
        <button onclick="redictToHome()"> SHOW PORTFOLIO </button>
      </aside>
      <?php
      if(isset($_SESSION["admin"]) || isset($_SESSION["guest"]))
      {
        echo "
        <aside class= 'buttonContainer'>

          <button onclick='redictToLogout()' > LOG OUT  </button>

        </aside>";

      }else{
      echo "
      <aside class= 'buttonContainer'>

        <button onclick='redictToLoginForm()' > LOG IN  </button>

      </aside>";
      }
      ?>
    </div>
  </div>

  <footer>
    © 2020, Sheikh Irfan Navid
  </footer>
</body>

</html>

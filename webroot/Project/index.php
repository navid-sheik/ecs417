<?php
session_start();
$guest = $_SESSION["guest"] ;
$userId =  $_SESSION["userId"];
$userAdmin = $_SESSION["admin"];
include 'conn.inc.php';
?>
<!doctype html>

<head>
  <link rel="stylesheet" href="index.css" type="text/css">
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1">

  <script type="text/javascript">
    function showHideGeneral(id) {

      var aboutMeElement = document.getElementById("AboutMeSection");
      var portafolioElement = document.getElementById("portafolioSection");
      var experienceElement = document.getElementById("experienceSection");
      var skillsElement = document.getElementById("skillsSection");
      var educationElement = document.getElementById("educationSection");

      let sectionsArray = [aboutMeElement, portafolioElement, experienceElement, skillsElement, educationElement];

      console.log("Somethin" + sectionsArray.length);
      for (var i = 0; i < sectionsArray.length; i++) {
        console.log("Somethin" + sectionsArray[i]);
        if (sectionsArray[i].style.display = "block")
          sectionsArray[i].style.display = "none";
      }
      document.getElementById(id).style.display = "block";
    }

    function hide(arrayPassed) {
      var i;
    }


    function redictToPostForm() {
      window.location = 'addPost.html';
    }

    function redictToLoginForm() {
      window.location = 'login.html';
    }

    function redictToViewBlog() {
      window.location = 'viewblog.php';
    }
  </script>

  <head>

  <body>
    <div id="mainflexHome">

      <header>
        <div id='title'>
          <span>My Portfolio</span>
        </div>
        <!--CHANGE HEADER BASED ON THE USER LOGGED IN-->
        <?php
    if (isset($_SESSION["admin"])){
      echo "
        <nav>
          <ul>
            <li> <a href= 'index.php'> Home </a> </li>
            <li> <a href= 'viewBlog.php'> My Blog </a> </li>
            <li> <a href= '#rightContainer'> My Details</a> </li>
            <li> <a href= '#leftContainer'> My Portfolio</a> </li>
            <li> <a href='logout.php'> Log out</a> </li>
          </ul>
        </nav>";
    }else
    {
      echo "
        <nav>

          <ul>
            <li> <a href= 'index.php'> Home </a> </li>
            <li> <a href= 'viewBlog.php'> Blog </a> </li>
            <li> <a href= '#rightContainer'> Contact</a> </li>
            <li> <a href= '#leftContainer'> Portfolio</a> </li>
            ";
            if(isset($_SESSION["guest"]))
            {echo "<li> <a href='logout.php'>Guest Log Out</a> </li>";}
            else
            {echo "<li> <a href='login.html'>Log In</a> </li>";}
        echo "</ul></nav>";
      }
    ?>
      </header>

      <div id="introduction">
        <div id="introContainer">
          <!--Left Part of the introduction-->
          <div id="textIntro">
            <div id="textIntroContent">
              <h3>Hey </h3>
              <h1>I AM NAVID </h1>
              <h2>STUDENT SOFTWARE DEVELOPER</h2>
              <div id="buttonDiv">
                <div class="individualButtonContainer">
                  <button type="button" onclick="location.href='mailto:navidsheikh2020@gmail.com';">Contact Me</button>
                </div>
                <div class="individualButtonContainer">
                  <a href="tech.docx" download="Navid_Sheikh_Cv"> <button type="button"> Get Cv</button></a>
                </div>
              </div>
            </div>
          </div>
          <!--Right Part of the introduction-->
          <div id="imageIntro">
            <img src="stack3.png" alt="" width="343" height="307">
          </div>
        </div>
      </div>

      <!--****************************BUTTON CARDS SHOW/HIDE******************************-->
      <div id="cardContainer">
        <div class="card">
          <button type="button" id="aboutMeButton" onclick="showHideGeneral('AboutMeSection')">About Me</button>
        </div>
        <div class="card">
          <button type="button" id="experienceButton" onclick="showHideGeneral('experienceSection')">Experience </button>
        </div>
        <div class="card">
          <button type="button" id="portafolioButton" onclick="showHideGeneral('portafolioSection')">Portfolio</button>
        </div>
        <div class="card">
          <button type="button" id="skillsButton" onclick="showHideGeneral('skillsSection')">Skills and Achievements </button>
        </div>
        <div class="card">
          <button type="button" id="educationButton" onclick="showHideGeneral('educationSection')">Education and Qualifications </button>
        </div>
      </div>
      <!--****************************MIDDLE PARTS******************************-->
      <div id="mainMiddle">
        <!--Left Part of the main contetnt-->
        <div id="leftContainer">
          <article id="sectionsContainer">
            <!--ABOUT ME SECTION-->
            <section class="content" id="AboutMeSection" style="display: block">

              <div class="contentTitle">
                <h1>About Me </h1>
              </div>

              <div class="contentText">
                <div id="aboutMeFirstRow">
                  <div id="profileImage">
                    <img src="icon.png" alt="something" width="250" height="250">
                  </div>

                  <div id="personalInfo">
                    <p><strong>Name:</strong> Sheikh Navid</p>
                    <p><strong>Surname:</strong> Sheikh </p>
                    <p><strong>Address:</strong> 86 Friars Road,E61LL, London,UK</p>
                    <p><strong>Role:</strong> Software Developer</p>
                    <p><strong>Date of Birth:</strong> 16 January 2000</p>
                    <p><strong>Material Status:</strong> Single</p>
                    <p><strong>Sex:</strong> Male</p>
                  </div>
                </div>

                <div id="shortText">
                  <p>
                    Having always been involved with technology, helped me realized that I wanted to be part of a
                    company which embraces solving problems. I always strive to achieve the highest standard possible,
                    without wasting time. I am used to working in a fast pace environment individually, as well as in a team.
                    Seeks a challenging and varied position that will enable me to capitalise my skills, with opportunities for
                    personal and professional growth.
                  </p>
                </div>

                <div id="interets">
                  <img src="interest4.png">
                </div>

              </div>

            </section>

            <!--SKILLS & ACHIVEMENT SECTION-->
            <section class="content" id="skillsSection" style="display: none">
              <div class="contentTitle">
                <h1>Skills & Achievements </h1>
              </div>
              <!--SKILLS SECTION-->
              <div id="skillsContainer">
                <div id="titleSkillSection">
                  <h2> SOFT & TECHNICAL SKILLS </h2>
                </div>
                <div id="skillsContent">
                  <div id="skillsText">
                    <!--PERSONAL SKLLS LEFT-->
                    <div id="personalSkills">
                      <ul class="skillsList">
                        <li>Problem solving</li>
                        <ul class="descriptiveList">
                          <li>Having studied computer science , I developed a new way of thinking that
                            allow me to break down a big problem in smallet problem that are easier to solve. </li>
                        </ul>
                        <li>TeamWork</li>
                        <ul class="descriptiveList">
                          <li> I've always find very easy to communicate and share responsabilities with others.
                            I am very familiar with software that allow team project such as Git and Github.  </li>
                        </ul>
                        <li>Decision Making </li>
                        <ul class="descriptiveList">
                          <li>Whenever there is something uncertain , I usually take action and propose a solution
                            suitable for the current problem. Making few but right decision will guarantee the results right away.</li>
                        </ul>
                        <li>Customer Service</li>
                        <ul class="descriptiveList">
                          <li> I have been trained to work for customers and help them whenever an issue is presented.
                            More importantly I can adapt easily to the customers' requirements.</li>
                        </ul>
                      </ul>
                    </div>

                    <!--TECHNICAL SKLLS RIGHT-->
                    <div id="technicalSkills">
                      <ul class="skillsList">
                        <li>Mobile UI design expertise</li>
                        <ul class="descriptiveList">
                          <li>Since the user experience has been one of the most important think, I worked on
                          developing several UI designs using HTML,CSS,MYSQL .</li>
                        </ul>
                        <li>Web Development</li>
                        <ul class="descriptiveList">
                          <li>I mastered the basics of web development : HTML, CSS,JAVASCTIPT, SQL, PHP. Moreover
                            I am very familiar with web framework such as Bootstrap, Django and AngularJS</li>
                        </ul>
                        <li>Java Development</li>
                        <ul class="descriptiveList">
                          <li>I worked on several projects that involved the use of JAVA. I am very confident
                            on my object oriented skills which are essential on large program.Good understanding of GUI developement with SWING.</li>
                        </ul>
                        <li>IOS Development</li>
                        <ul class="descriptiveList">
                          <li> With huge market for mobile applications, I decided to learn SWIFT to create
                            app.I am at an intermidiate level where I can handle working on simple applications.</li>
                        </ul>
                      </ul>
                    </div>
                  </div>
                  <!--IMAGE BADGE FOR DISPLAY-->
                  <div id="skillsBadge">
                    <img src="badgeskills.png ">
                  </div>
                </div>
              </div>
              <!--ACHIVEMENT SECTION-->
              <div id="titleAchivementSection">
                <h2> ACHIVEMENT </h2>
              </div>
              <div id="achivemetsContainer">
                <div class="achivement">
                  <p> #1.Developed a responsive ecommerce site with 10,000 monthly visitor</p>
                </div>
                <div class="achivement">
                  <p> #2.Build a food tracker app that was available in the apple store</p>
                </div>
                <div class="achivement">
                  <p> #3. Developed a live stock desktop application that allow the user to monitor the stock exchange<p>
                </div>
              </div>
            </section>

            <!--EDUCATION & QUALIFICATION SECTION-->
            <section class="content" id="educationSection" style="display: none">
              <div class="contentTitle">
                <h1>Education&Qualifications </h1>
              </div>
              <div id="educationAwardContainer">
                <!--EDUCATION-->
                <div id="educationHistoryContent">
                  <table id="educationTable">
                    <thead>
                      <tr>
                        <th> Year </th>
                        <th> Institute </th>
                        <th> Qualifactions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td> 2019-2020</td>
                        <td> Queen Mary University Of London</td>
                        <td> Computer Science BSC</td>
                      </tr>
                      <tr>
                        <td> 2017-2019</td>
                        <td> Havering Sixth Form COllege</td>
                        <td>

                          <ul>
                            <li> A-level Computer Science (A)</li>
                            <li> A-level Mathematics (B)</li>
                            <li> A-level Design&Technology (B)</li>
                        </td>
                      </tr>
                      <tr>
                        <td> 2016-2017</td>
                        <td> Newham College </td>
                        <td>

                          <ul>
                            <li> GSCE Information Technology (A)</li>
                            <li> GSCE Mathematics (7)</li>
                            <li> GSCE English Language (5)</li>
                            <li> GSCE English Literature (5)</li>
                            <li> GSCE Science (5)</li>
                            <li> GSCE Citizenship (5)</li>
                        </td>
                      </tr>
                    </tbody>

                  </table>
                </div>
                <!--AWARDS-->
                <div id="titleAward">
                  <h2>AWARD & CERTIFICATE </h2>
                </div>
                <div id="awardContent">
                  <p> During my learning years , I completed several certified course that allowed me
                  to progress my education even further .These are some of the awards and certificates that I have
                  received upon achieving their criteria: </p>
                  <ul>
                    <li> W3Schools HTML Certificate</li>
                    <li> AQA Preparation For Working Life</li>
                    <li> N/A</li>

                  </ul>
                </div>
              </div>
            </section>
            <!--EXPERIENCE SECTION-->
            <section class="content" id="experienceSection" style="display: none">
              <div class="contentTitle">
                <h1>Experience</h1>
              </div>
              <div id="experieceContainer">
                <section class="jobPost">
                  <div class="experienceHeader">
                    <div class="headerFirstRow">
                      <div class="titleJob">
                        Online Representative
                      </div>
                      <div class="dateJob">
                        2018-2019
                      </div>
                    </div>
                    <div class="headerSecondRow">
                      <p><i>Multiple Companies</i></p>
                    </div>
                  </div>
                  <div class="jobDescription">
                    <p> During my years , I was an online employee to various e-commerce sites. My role consisted to
                      deal with customers who was having any issue with their orders. I was able to learn how to communicate with
                      customers in a professional which lead to the company an exponential increase on sales. </p>
                    <p> <i>Responsabilities </i></p>
                    <ul>
                      <li> Investigate any issue raised by the customer and resolve in a short amount time </li>
                      <li> Help the team in advertising campaign to drive profitable sale to the company</li>
                      <li> Send notifications to the customers about the status of their orders </li>
                      <li> Manage invetory of all the item ensuring they are in stock</li>
                    </ul>
                  </div>
                </section>


                <!----------Another job ---------->
                <section class="jobPost">
                  <div class="experienceHeader">
                    <div class="headerFirstRow">
                      <div class="titleJob">
                        FreeLancer
                      </div>

                      <div class="dateJob">
                        2017-2018
                      </div>
                    </div>

                    <div class="headerSecondRow">
                      <p><i>Individual Customers</i></p>
                    </div>


                  </div>
                  <div class="jobDescription">
                    <p> I created and customized different type of websites on WIX,WORDPRESS and SHOPIFY for clients who
                      purchased my service. This type of arrangement improved my development skills.</p>
                    <p> <i>Responsabilities </i></p>
                    <ul>
                      <li> Create site accordingly to the client's specification  </li>
                      <li> Make changes to existing sites to ensure they are well presented </li>
                      <li> Add new features if requested by the client</li>
                      <li> Add/Modify entries of a blog or ecommerce site for fixed time of period</li>
                    </ul>

                  </div>
                </section>
                <!----------Another job 2 ---------->
                <section class="jobPost">
                  <div class="experienceHeader">
                    <div class="headerFirstRow">
                      <div class="titleJob">
                        Waiter
                      </div>
                      <div class="dateJob">
                       2016-2017
                      </div>
                    </div>
                    <div class="headerSecondRow">
                      <p><i>Wasabi</i></p>
                    </div>
                  </div>
                  <div class="jobDescription">
                    <p> At wasabi I was in charge to display and serve the meal the customers. Here I learned
                    how to work efficiently in a team.</p>
                    <p> <i>Responsabilities </i></p>
                    <ul>
                      <li> Store  foods in the boxes and display in them in shelf</li>
                      <li> Assistethe customer to complete the purchase and help them with any request </li>
                      <li> Make sure that the table and the environment for the customer was clean</li>
                      <li> Meet and communicate with  other member staff to review change on the menu </li>
                    </ul>
                  </div>
                </section>
              </div>
            </section>
            <!----------PORTFOLIO---------->
            <section class="content" id="portafolioSection" style="display: none">
              <div class="contentTitle">
                <h1>Portfolio</h1>
              </div>
              <div id="mainPortafolioContainer">
                <section class="projectContent">
                  <div class="projectImage">
                    <img src="noImage.jpg" width="200px" height="200px">
                  </div>
                  <div class="projectDetails">
                    <h3> Food Tracker Reviewer</h3>
                    <p>This was a simple app that let users to add/edit or remove a review for a food tasted on restaurant.
                      It was a tracker for the users so that they can remember the place that they have been before and check
                      if they food tasted good.
                    </p>

                    <ul>
                      <li>Compatibility : iOS</li>
                      <li>Front End : SWIFT UI</li>
                      <li>Back End : SWIFT, MYSQL</li>
                      <li> Category : Food </li>
                    </ul>
                    <br>
                    <a href="#">Find Out More</a>
                  </div>
                </section>
                <!----------Project 1---------->
                <section class="projectContent">
                  <div class="projectImage">
                    <img src="noImage.jpg" width="200px" height="200px">
                  </div>
                  <div class="projectDetails">
                    <h3> Portafolio + Blog </h3>
                    <p> This project is a showcase of myself on a website that can be viewed by employers or
                    companie. It includes all my information that someone might need to know. A blog has been included
                    to show to the viewers what project I am working on.</p>

                    <ul>
                      <li>Compatibility : Window, MACOS, iOS, ANDROID</li>
                      <li>Front End : HTML,CSS,JAVASCRIPT</li>
                      <li>Back End : PHP, MYSQL</li>
                      <li> Category : Business </li>
                    </ul>
                    <br>
                    <a href="#">Find Out More</a>
                  </div>
                </section>
                <!----------Project 2---------->
                <section class="projectContent">
                  <div class="projectImage">
                    <img src="noImage.jpg" width="200px" height="200px">
                  </div>
                  <div class="projectDetails">
                    <h3> Stock Exchange Simulator</h3>
                    <p> I build a simple stock simulator that allow the user to buy/sell stock like in the real market.
                        The exchange has a live system that update the prices of the assets such as bonds,shares,funds.

                    </p>
                    <ul>
                      <li>Compatibility : Window,MACOS </li>
                      <li>Front End : Java Swing </li>
                      <li>Back End : Java </li>
                      <li> Category : Finance</li>
                    </ul>
                    <br>
                    <a href="#">Find Out More</a>
                  </div>
                </section>
              </div>
            </section>
          </article>
        </div>
        <!--Left Part of the main contetnt-->


        <div id="rightContainer">
          <aside class="sideContent">
            <div class="sideTitle">
              <h1>Contact Details </h1>
            </div>
            <div id="personInformation">
              <p> Full Name : Sheikh Irfan Navid</p>
              <p> Email Address : navidsheikh54@gmail.com</p>
              <p> Telephone number : 07405241512</p>
              <p> Github : /github</p>
              <p> Linkedin : /link</p>
            </div>
            <div id="imageSocialLink">
              <img src="fb.png" width="30px" height="30px">
              <img src="insta.png" width="30px" height="30px">
              <img src="snapchat.png" width="30px" height="30px">
              <img src="twitter.png" width="30px" height="30px">
            </div>
          </aside>
          <aside class="sideContent">
            <div class='sideTitle'>
              <h1>Latest Blog</h1>
            </div>
            <?php
          $latestPostQuery=  "SELECT id, postId, title ,content, postDate FROM usersPosts WHERE id='1' ORDER BY postDate DESC LIMIT 1";
          $resultLatestPost = $conn->query($latestPostQuery);
          if ($resultLatestPost->num_rows == 1)
          {
            $rowPost = $resultLatestPost->fetch_assoc();
            $titleLatestPost = $rowPost["title"];
            $contentLatestPost = $rowPost["content"];
            echo "
            <div id='lastestblog'>
              <div id='latestTitleBlog'>
                $titleLatestPost
              </div>
              <div id='latestContentBlog'>
                <p> $contentLatestPost</p>
              </div>
            </div>";
          }else
          {
            echo "
            <div id='lastestblog'>
              <div id='latestTitleBlog'>
                N/A
              </div>
              <div id='latestContentBlog'>
                <p> N/A</p>
              </div>
            </div>
            ";
          }
         ?>
            <div id="latestBlogButtons">
              <?php
            if (isset($_SESSION["admin"])){
              echo "
              <button id= 'postSomethingHomeButton' onclick= 'redictToPostForm();'  >   Post now</button>";
            }else if (isset($_SESSION["guest"]))
            {
              echo "
              <button id= 'postSomethingHomeButton' onclick= 'redictToViewBlog();'  > Comment </button>";
            }
            else
            {
              echo "  <button  id= 'redictToLogIn' onclick = 'redictToLoginForm();'> Log In</button>";
            }
            ?>
              <button onclick="redictToViewBlog()"> See More</button>
            </div>
          </aside>
        </div>
      </div>
    </div>
    <footer>
      © 2020, Sheikh Irfan Navid
    </footer>
  </body>


  </html>

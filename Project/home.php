<?php
session_start();

if(isset($_SESSION['email'])){
    
}
else{
    echo '<script>window.location.href="templates/login.php"</script>'; //homepage
}

?>
<?php
   require_once('templates/connect.php');
   $team1_query = mysqli_query($connect,"select t_name from teams where t_id in (select t1_id from matches where active = 'yes')");
   $team2_query = mysqli_query($connect,"select t_name from teams where t_id in (select t2_id from matches where active = 'yes')");
   $stadiums_query = mysqli_query($connect,"select s_name from stadium where s_id in (select s_id from matches where active = 'yes')");
   $goal1_query = mysqli_query($connect,"select t1_goal from matches where t1_goal in (select t1_goal from matches where active = 'yes')");
   $goal2_query = mysqli_query($connect,"select t2_goal from matches where t2_goal in (select t2_goal from matches where active = 'yes')");
   $tournaments_query = mysqli_query($connect,"select tournament_names from tournament where tournament_names in (select tournament_names from tournament)");
    $teamnames_query = mysqli_query($connect,"select t_name from teams where t_id in (select t_id from teams)");
   $team1 = mysqli_fetch_array($team1_query);
   $team2 = mysqli_fetch_array($team2_query);
   $stadiums= mysqli_fetch_array($stadiums_query);
   $goal1= mysqli_fetch_array($goal1_query);
   $goal2= mysqli_fetch_array($goal2_query);
   $tournaments= mysqli_fetch_array($tournaments_query);
   $teamnames= mysqli_fetch_array($teamnames_query);
?>
<html lang="en">
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <!-- Site Metas -->
   <title>Sports News</title>
  <!--  --> 
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- Site Icons -->
   <link rel="shortcut icon" href="" type="image/x-icon" />
   <link rel="apple-touch-icon" href="">
   <!-- Bootstrap CSS -->
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
   <!-- Site CSS -->


   <link rel="stylesheet" href="css/styles.css">
   <!-- Colors CSS -->
   <link rel="stylesheet" href="css/colors.css">
   <!-- ALL VERSION CSS -->	
   <link rel="stylesheet" href="css/versions.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/custom.css">
   <!-- font family -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <!-- end font family -->
   <link rel="stylesheet" href="css/3dslider.css" />
   <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
   <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
   <script src="js/3dslider.js"></script>
   </head>
   <body class="game_info" data-spy="scroll" data-target=".header">
      
      <section id="top">
         <header>
           <!--  <div class="container"> -->
               <!-- <div class="header-top"> -->
                  <div class="row">
                     <div class="col-md-6">
                        <div class="full">
                           <div class="logo">
                              <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="right_top_section">
                           <!-- <ul class="social-icons pull-left"> -->
                             <!--  <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                              <li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
                             <!--  <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li> -->
                           <!-- </ul> -->
                           <!-- end social icon
                           button section -->
                           <ul class="logout">
                              <li class="login-modal">
                                 <a href="templates/login.php" class="login"><i class="fa fa-user" style=" position: absolute;
  right: 0px;
  width: 300px;
  border: 3px solid #;
  color: white;
  padding: 10px;" ><?php echo $_SESSION['email']; ?>
  logout</i></a>
                              </li>
                           </ul>
                         <!--   <-- end button section -->
                   <!--      </div>
                     </div>
                  </div>
               </div> 
               <div class="header-bottom">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="full">
                           <div class="main-menu-section">
                              <div class="menu">
                                 <nav class="navbar navbar-inverse">
                                    <div class="navbar-header">
                                       <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                                       <span class="sr-only">Toggle navigation</span>
                                       <span class="icon-bar"></span>
                                       <span class="icon-bar"></span>
                                       <span class="icon-bar"></span>
                                       </button>
                                       <a class="navbar-brand" href="#">Menu</a>
                                    </div>
                                    <div class="collapse navbar-collapse js-navbar-collapse">
                                       <ul class="nav navbar-nav">
                                          <li class="active"><a href="index.html">Home</a></li>
                                          <li><a href="about.html">About</a></li>
                                          <li><a href="team.html">Team</a></li>
                                          <li><a href="news.html">News</a></li>
                                          <li class="dropdown mega-dropdown">
                                             <a href="match" class="dropdown-toggle" data-toggle="dropdown">Match<span class="caret"></span></a>				
                                             <ul class="dropdown-menu mega-dropdown-menu">
                                                <li class="col-sm-8">
                                                   <ul>
                                                      <li class="dropdown-header">Men Collection</li>
                                                      <div id="menCollection" class="carousel slide" data-ride="carousel">
                                                         <div class="carousel-inner">
                                                            <div class="item active">
                                                               <div class="banner-for-match"><a href="#"><img class="img-responsive" src="images/match-banner1.jpg" alt="#" /></a>
                                                               </div>
                                                            </div>
                                                            <-- End Item
                                                            <div class="item">
                                                               <div class="banner-for-match"><a href="#"><img class="img-responsive" src="images/match-banner1.jpg" alt="#" /></a>
                                                               </div>
                                                            </div>
                                                            End Item
                                                            <div class="item">
                                                               <div class="banner-for-match"><a href="#"><img class="img-responsive" src="images/match-banner1.jpg" alt="#" /></a>
                                                               </div>
                                                            </div>
                                                            End Item                      
                                                          </div>
                                                         <-- End Carousel Inner
                                                         <-- Controls
                                                         <a class="left carou --><!-- sel-control"  href="#menCollection" role="button" data-slide="prev">
                                                         <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                         <!-- <span class="sr-only">Previous</span> -->
                                       <!--                   </a>
                                                         <a class="right carousel-control" href="#menCollection" role="button" data-slide="next">
                                                         <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                         <span class="sr-only">Next</span>
                                                         </a>
                                                      </div>
                                                   </ul>
                                                </li>
                                                <li class="col-sm-4">
                                                   <ul class="menu-inner">
                                                      <li class="dropdown-header">Next Matchs</li>
                                                      <li><a href="#">Contrary vs classical</a></li>
                                                      <li><a href="#">Discovered vs undoubtable</a></li>
                                                      <li><a href="#">Contrary vs classical</a></li>
                                                      <li><a href="#">Discovered vs undoubtable</a></li>
                                                      <li><a href="#">Contrary vs classical</a></li>
                                                      <li><a href="#">Discovered vs undoubtable</a></li>
                                                      <li><a href="#">Contrary vs classical</a></li>
                                                      <li><a href="#">Discovered vs undoubtable</a></li>
                                                   </ul>
                                                </li>
                                             </ul>
                                          </li>
                                          <li><a href="blog.html">Blog</a></li>
                                          <li><a href="contact.html">contact</a></li>
                                       </ul>
                                    </div>
                                 </nav> -->  
                                 <!-- <div class="search-bar">
                                    <div id="imaginary_container">
                                       <div class="input-group stylish-input-group">
                                          <input type="text" class="form-control"  placeholder="Search" >
                                          <span class="input-group-addon">
                                          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>  
                                          </span>
                                       </div>
                                    </div>
                                 </div>  -->
                              <!-- </div>
                           </div>
                        </div>
                     </div> -->
                  </div>
               </div>
            </div>
         </header> --> -->  --> 
         <div class="full-slider">
            <div id="carousel-example-generic" class="carousel slide">
               <!-- Indicators -->
               <!-- <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
               </ol> -->
               <!-- Wrapper for slides -->
               <!-- <div class="carousel-inner" role="listbox">
                   First slide
                  <div class="item active deepskyblue" data-ride="carousel" data-interval="5000">
                     <div class="carousel-caption">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12"></div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                           <div class="slider-contant" data-animation="animated fadeInRight">
                              <h3>If you Don’t Practice<br>You <span class="color-yellow">Don’t Derserve</span><br>to win!</h3>
                              <p>If you use this site regularly and would like to help keep the site on the Internet,<br>
                                 please consider donating a small sum to help pay..
                              </p>
                              <button class="btn btn-primary btn-lg">Read More</button>
                           </div>
                        </div>
                     </div>
                  </div> -->
               
               <!--     Second slide
                  <div class="item skyblue" data-ride="carousel" data-interval="5000">
                     <div class="carousel-caption">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12"></div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                           <div class="slider-contant" data-animation="animated fadeInRight">
                              <h3>If you Don’t Practice<br>You <span class="color-yellow">Don’t Derserve</span><br>to win!</h3>
                              <p>You can make a case for several potential winners of<br>the expanded European Championships.</p> --> 
                              <!-- <button class="btn btn-primary btn-lg">Button</button> -->
                        <!--    </div>
                        </div>
                     </div> -->
                  <!-- </div> -->
                  <!-- /.item -->
                  <!-- Third slide -->
                <!--   <div class="item darkerskyblue" data-ride="carousel" data-interval="5000">
                     <div class="carousel-caption">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12"></div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                           <div class="slider-contant" data-animation="animated fadeInRight"> -->
                             <!--  <h3>If you Don’t Practice<br>You <span class="color-yellow">Don’t Derserve</span><br>to win!</h3> -->
                             <!--  <p>You can make a case for several potential winners of<br>the expanded European Championships.</p> -->
                       <!--        <button class="btn btn-primary btn-lg">Button</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <-- /.item -->
               <!-- </div>  -->
              <!--  <-- /.carousel-inner -->
                <!-- <-- Controls -->  
              <!--  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
               </a>
               <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
               </a> -->
            <!-- </div> -->
         
             <div class="news">
               <div class="container">
                  <div class="heading-slider">
                     <!-- <p class="headline"><i class="fa fa-star" aria-hidden="true"></i> Top Headlines :</p>
                     made by vipul mirajkar thevipulm.appspot.c -->
                    <!--  <h1>
                     <a href="" class="typewrite" data-period="2000" data-type='[ "Contrary to popular belief, Lorem Ipsum is not simply random text.", "Lorem Ipsum is simply dummy text of the printing and typesetting industry.", "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout."]'>
                     <span class="wrap"></span>
                     </a>
                     </h1	   --> 
                     <span class="wrap"></span>
                     </a>
                  </div>
               </div> 
            </div>
         </div>
      </section>
      <div class="matchs-info">
         <!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->
            <div class="row">
               <div class="full">
                  <div class="matchs-vs">
                     <div class="vs-team">
                        <div class="team-btw-match">
                           <ul>
                              <h1 class = "mt-4 container-fluid"  align="center">
                                <?php
                                echo $tournaments['tournament_names'];
                                ?>
                              </h1>
                                <h2 class = "mt-4 container-fluid"  align="center">
                                    <?php
                                    echo $stadiums['s_name'];
                                    ?>
                                 
                                 </h2>
                              <li>
                                 <span class="mt-10
                                 ">
                                    <img src="images/img-03.png" alt="">
                                 </span>
                                 
                                 <span><?php
                                 echo $team1['t_name'];
                                 ?>
                                 </span>
                                 <br>
                                 <span class = "mt-4">
                                    <h1> 
                                       <?php
                                       echo $goal1['t1_goal'];
                                       ?>
                                    </h1>
                                 </span>
                              </li>
                              <li class="vs"><span>vs</span></li>
                              <li>
                                 <img src="images/img-04.png" alt="">
                                 <span>
                                    <?php echo $team2['t_name'];?>
                                 </span>
                                 <br>
                                 <span class = "mt-4">
                                    <h1> 
                                       <?php
                                       echo $goal2['t2_goal'];
                                       ?>
                                    </h1>
                                 </span>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->
           <!--  <div class="row">
               <div class="full">
                  <div class="right-match-time">
                     <h2>Next Match</h2>
                     <ul id="countdown-1" class="countdown">
                        <li><span class="days">10 </span>Day </li>
                        <li><span class="hours">5 </span>Hours </li>
                        <li><span class="minutes">25 </span>Minutes </li>
                        <li><span class="seconds">10 </span>Seconds </li>
                     </ul>
                    <!--  <span>12/02/2017 /19:00pm</span>
                  </div>
               </div>
            </div> --> -->
         </div>
      </div>
      <section id="contant" class="contant">
         <div class="container">
            <div class="row" style="margin-left: 18rem">
               <div class="col-lg-8 col-sm-6 col-xs-6">
                  <aside id="sidebar" class="left-bar">
                     <div class="banner-sidebar">
                        <!-- <img class="img-responsive" src="images/img-05.jpg" alt="#" /> -->
                        <!-- <h3>Lorem Ipsum is simply dummy text..</h3> -->
                     </div>
                  </aside>
                  <div  class= "match-fixture">
                  <h4>Match Fixture</h4>
                  <aside id="sidebar" class="left-bar" align="center">
                     <div class="feature-matchs">
                        <div class="team-btw-match" align="center" >
                           <?php while ($row = mysqli_fetch_array($teamnames_query)):; ?>
                              <?php $teamnames_query2 = mysqli_query($connect,"select t_name from teams where t_id in (select t_id from teams)"); ?>
                              <?php while ($row2 = mysqli_fetch_array($teamnames_query2)):; ?>
                              <ul>
                              <?php if($row['t_name'] != $row2['t_name']) {?>
                                 <li>
                                    <span>
                                       <?php
                                          echo $row['t_name'];
                                       ?>
                                    </span>
                                 </li>
                                 <span>
                                    vs
                                 </span>
                                 <li>
                                    <span>
                                       <?php
                                       if($row['t_name'] != $row2['t_name'])
                                          echo $row2['t_name'];
                                       ?>
                                    </span>
                                 </li>
                              <?php }


                               ?>
                              </ul>
                              <?php endwhile; ?>
                           <?php endwhile; ?>
                        </div>
                     </div>
                  </aside>
               </div>
            </div>
               </div>
                  <h4>Points Table</h4>
                  <aside id="sidebar" class="left-bar">
                     <div class="feature-matchs">
                        <table class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Team</th>
                                 <th>P</th>
                                 <th>W</th>
                                 <th>L</th>
                              </tr>
                           </thead>
                           <tbody>
                               <?php
                                 $teamnames_query3 = mysqli_query($connect,"select t_name from teams where t_id in (select t_id from teams)");
                               while ($row = mysqli_fetch_array($teamnames_query3)):; ?>
                              <tr>
                                 <td>#</td>
                                 <td>
                                          <?php
                                             echo $row['t_name'];
                                          ?>
                                          </td>
                                 <td>P</td>
                                 <td>W</td>
                                 <td>L</td>
                              </tr>
                                    
                              <?php endwhile; ?>
                              <!-- <tr>
                                 <td>1</td>
                                 <td><img src="images/img-01_004.png" alt="">echo</td>
                                 <td>5</td>
                                 <td>4</td>
                                 <td>1</td>
                              </tr>
                              <tr>
                                 <td>2</td>
                                 <td><img src="images/img-02_002.png" alt="">Mapusa FC</td>
                                 <td>5</td>
                                 <td>4</td>
                                 <td>1</td>
                              </tr>
                              <tr>
                                 <td>3</td>
                                 <td><img src="images/img-03_003.png" alt="">Panjim FC</td>
                                 <td>5</td>
                                 <td>3</td>
                                 <td>2</td>
                              </tr>
                              <tr>
                                 <td>4</td>
                                 <td><img src="images/img-04_002.png" alt="">Calangute FC</td>
                                 <td>5</td>
                                 <td>3</td>
                                 <td>2</td>
                              </tr>
                              <tr>
                                 <td>5</td>
                                 <td><img src="images/img-05.png" alt="">Verla FC</td>
                                 <td>5</td>
                                 <td>2</td>
                                 <td>3</td>
                              </tr>
                              <tr>
                                 <td>1</td>
                                 <td><img src="images/img-01_004.png" alt="">Vasco FC</td>
                                 <td>5</td>
                                 <td>2</td>
                                 <td>3</td>
                              </tr> -->
                           </tbody>
                        </table>
                     </div>
                  </aside>
         <!--          <div class="content-widget top-story" style="background: url(images/top-story-bg.jpg);">
                     <div class="top-stroy-header">
                        <h2>Top Soccer Headlines Story <a href="#" class="fa fa-fa fa-angle-right"></a></h2>
                        <span class="date">July 05, 2017</span>
                        <h2>Other Headlines</h2>
                     </div>
                     <ul class="other-stroies">
                        <li><a href="#">Wenger Vardy won't start</a></li>
                        <li><a href="#">Evans: Vardy just</a></li>
                        <li><a href="#">Pires and Murray </a></li>
                        <li><a href="#">Okazaki backing</a></li>
                        <li><a href="#">Wolfsburg's Rodriguez</a></li>
                        <li><a href="#">Jamie Vardy compared</a></li>
                        <li><a href="#">Arsenal target Mkhitaryan</a></li>
                        <li><a href="#">Messi wins libel case.</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-8 col-sm-8 col-xs-12">
                  <div class="news-post-holder">
                     <div class="news-post-widget">
                        <img class="img-responsive" src="images/img-01_002.jpg" alt="">
                        <div class="news-post-detail">
                           <span class="date">20 march 2016</span>
                           <h2><a href="blog-detail.html">At vero eos et accusamus et iusto odio dignissimos ducimus</a></h2>
                           <p>Just hours after that his grandma had died, Angel Di Maria imagined how she might react if he didn't play</p>
                        </div>
                     </div>
                     <div class="news-post-widget">
                        <img class="img-responsive" src="images/img-02_003.jpg" alt="">
                        <div class="news-post-detail">
                           <span class="date">20 march 2016</span>
                           <h2><a href="blog-detail.html">At vero eos et accusamus et iusto odio dignissimos ducimus</a></h2>
                           <p>Just hours after that his grandma had died, Angel Di Maria imagined how she might react if he didn't play</p>
                        </div>
                     </div>
                  </div>
                  <div class="news-post-holder">
                     <div class="news-post-widget">
                        <img class="img-responsive" src="images/img-03_003.jpg" alt="">
                        <div class="news-post-detail">
                           <span class="date">20 march 2016</span>
                           <h2><a href="blog-detail.html">At vero eos et accusamus et iusto odio dignissimos ducimus</a></h2>
                           <p>Just hours after that his grandma had died, Angel Di Maria imagined how she might react if he didn't play</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main-heading sytle-2">
                        <h2>Video</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium<br>doloremque laudantium, totam rem aperiam</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="video_section_main theme-padding middle-bg vedio">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="match_vedio">
                        <img class="img-responsive" src="images/img-07.jpg" alt="#" />
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <div class="team-holder theme-padding">
         <div class="container">
            <div class="main-heading-holder">
               <div class="main-heading sytle-2">
                  <h2>Meet Your Team</h2>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium<br>doloremque laudantium, totam rem aperiam</p>
               </div>
            </div>
            <div id="team-slider">
               <div class="container">
                  <div class="col-md-3">
                     <div class="team-column style-2">
                        <img src="images/img-1-1.jpg" alt="">
                        <div class="player-name">
                           <div class="desination-2">Defender</div>
                           <h5>Charles Wheeler</h5>
                           <span class="player-number">12</span>
                        </div>
                        <div class="overlay">
                           <div class="team-detail-hover position-center-x">
                              <p>Lacus vulputate torquent mollis venenatis quisque suspendisse fermentum primis,</p>
                              <ul class="social-icons style-4 style-5">
                                 <li><a class="facebook" href="#" tabindex="0"><i class="fa fa-facebook"></i></a></li>
                                 <li><a class="twitter" href="#" tabindex="0"><i class="fa fa-twitter"></i></a></li>
                                 <li><a class="youtube" href="#" tabindex="0"><i class="fa fa-youtube-play"></i></a></li>
                                 <li><a class="pinterest" href="#" tabindex="0"><i class="fa fa-pinterest-p"></i></a></li>
                              </ul>
                              <a class="btn blue-btn" href=" /soccer/team-detail.html" tabindex="0">View Detail</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="team-column style-2">
                        <img src="images/img-1-2.jpg" alt="">
                        <div class="player-name">
                           <div class="desination-2">Defender</div>
                           <h5>Charles Wheeler</h5>
                           <span class="player-number">12</span>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="team-column style-2">
                        <img src="images/img-1-3.jpg" alt="">
                        <div class="player-name">
                           <div class="desination-2">Defender</div>
                           <h5>Charles Wheeler</h5>
                           <span class="player-number">12</span>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="team-column style-2">
                        <img src="images/img-1-4.jpg" alt="">
                        <div class="player-name">
                           <div class="desination-2">Defender</div>
                           <h5>Charles Wheeler</h5>
                           <span class="player-number">12</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <footer id="footer" class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="full">
                     <div class="footer-widget">
                        <div class="footer-logo">
                           <a href="#"><img src="images/footer-logo.png" alt="#" /></a>
                        </div>
                        <p>Most of our events have hard and easy route choices as we are always keen to encourage new riders.</p>
                        <ul class="social-icons style-4 pull-left">
                           <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                           <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                           <li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
                           <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="full">
                     <div class="footer-widget">
                        <h3>Menu</h3>
                        <ul class="footer-menu">
                           <li><a href="about.html">About Us</a></li>
                           <li><a href="team.html">Our Team</a></li>
                           <li><a href="news.html">Latest News</a></li>
                           <li><a href="matche.html">Recent Matchs</a></li>
                           <li><a href="blog.html">Our Blog</a></li>
                           <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="full">
                     <div class="footer-widget">
                        <h3>Contact us</h3>
                        <ul class="address-list">
                           <li><i class="fa fa-map-marker"></i> Lorem Ipsum is simply dummy text of the printing..</li>
                           <li><i class="fa fa-phone"></i> 123 456 7890</li>
                           <li><i style="font-size:20px;top:5px;" class="fa fa-envelope"></i> demo@gmail.com</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="full">
                     <div class="contact-footer">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d120615.72236587871!2d73.07890527988283!3d19.140910987164396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1527759905404" width="600" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-bottom">
            <div class="container">
               <p>Copyright © 2018 Distributed by <a href="https://themewagon.com/" target="_blank">ThemeWagon</a></p>
            </div>
         </div>
      </footer>
      <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
      <-- ALL JS FILES -->
      <script src="js/all.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html> 
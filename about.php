<!DOCTYPE html>
<?php
    session_start(); // starts the session
    $_SESSION['url'] = $_SERVER['REQUEST_URI']; 
?>
<html>
    <head>
        <title>Dawuro</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="dawuro.png" />
        <!--  bootsrap css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="dawuroStyle2.css">
        <!-- font awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
        <!--    <style>background color="bron"</style>-->
    </head>
    <body>
        <nav class="navbar navbar-default"  class="navbar navbar" style="background-color: #ffffff;">
            <div class="container-fluid" id="mainnav">
                <div class="navbar-header" id="leftlogo">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand" href="index.php"> <img src="dawuro.png" id="logoImg" style="display:inline, height: 30px; width: 30px; margin-right: 10px" align="left" >D A W U R O</a>
                </div>
                <div class="collapse navbar-collapse" id="rightnav">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php" class="active">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="addEvent.php">Notices</a></li>
                        <li><a href="contact.php">Contact us</a></li>
                        <?php if(isset($_SESSION['user_id'])) echo "<li><a href='login.php'>Log out</a></li>";  else echo "<li><a href='login.php'>Log in</a></li>";?>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="content" align="center">
            
            <div id="compDes">
                <div id="who" align="center">
                    <p id="quest">WHO ARE WE?</p>
                </div>
                <div id="daw-image">
                    <img id="logo" src="dawuro.png">
                </div>
                <div id="textDesc">
                    <p id="info">A web based online application that allows students and staff of Ashesi University to post adverts of businesses on campus, new opportunities for employment or international opportunities and other general information that can be sent to and viewed by various year groups or all students. It is intended to reduce the amount of money needed for printing, buying pins, having so much information on the few notice boards available on campus and flooding the emails. <a href="ics.php?id=1&title=Elvis&description=Okoh&datestart=20180212&dateend=20180222&address=motulsky&stage=3">Download</a></p>
                </div>
            </div>
        </div>


        <footer class="row text-center">
            <div class="col-sm-4" id="subscribe">
                <p>Subscribe to our Newsletter</p>
                <div class="input-group">
                    <input type="email" class="form-control" placeholder="Enter your email">
                    <span class="input-group-btn">
                        <button class="btn btn-theme" type="submit" style="border-radius: 0 10px 10px 0;background: #243c4f;color: #fff;" onclick="subscribe()">Subscribe</button>
                    </span>
                </div>


            </div>
            <div class="col-sm-4" id="socialmedia">
                <h4>Follow us on Social media</h4>
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-youtube"></a>
                <a href="#" class="fa fa-instagram"></a>

            </div>
            <div class="col-sm-4" id="copyright">
                <p>Copyright 2018@Dawuro</p>
                <p><a href="http://ashesi.edu.gh">
                    D A W U R O</a></p>

            </div>
        </footer>

    </body>

</html>
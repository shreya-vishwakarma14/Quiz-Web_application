<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Project Worlds || FEEDBACK </title>
    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
    <link rel="stylesheet" href="css/main.css">
    <link  rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	<!--alert message-->
<?php 
  if(@$_GET['w'])
  {
    echo'<script>alert("'.@$_GET['w'].'");</script>';
  }
?>
<!--alert message end-->
  </head>
<body>
<!--header start-->
  <div class="row header">
    <div class="col-lg-6">
      <h2 style="color:orange; margin-left:20px; font-weight:bolder">Test Your Skill</h2>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-4">
      <?php
        include_once 'dbConnection.php';
        session_start();
        if((!isset($_SESSION['email'])))
        {
          echo '<a href="#" class="pull-right sub1 btn title3" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;Signin</a>&nbsp;';
        }
        else  
        {
          echo '<a href="logout.php?q=feedback.php" class="pull-right sub1 btn title3"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</a>&nbsp;';}
      ?>
      <a href="index.php" class="pull-right btn sub1 title3"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home</a>&nbsp;
    </div>
  </div>
<!--sign in modal start-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:orange">Log In</span></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="email"></label>  
  <div class="col-md-6">
    <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email"> 
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">
    
  </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Log in</button>
		</fieldset>
</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--sign in modal closed-->

<!--header end-->

<div class="bg1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6 panel" style="background:rgba(81,141, 193, 0.4); min-height:430px;">
<h2 align="center" style="font-family:'typo'; color:#000066">FEEDBACK/REPORT A PROBLEM</h2>
<div style="font-size:14px">
<?php if(@$_GET['q'])echo '<span style="font-size:18px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;'.@$_GET['q'].'</span>';
else
{echo' 
You can send us your feedback through e-mail on the following e-mail id:<br />
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<a href="mailto:chiraggoel.53784@gmail.com" style="color:#000000">bsh08@gmail.com</a><br /><br />
</div><div class="col-md-1"></div></div>
<p>Or you can directly submit your feedback by filling the enteries below:-</p>
<form role="form"  method="post" action="feed.php?q=feedback.php">
<div class="row">
<div class="col-md-3"><b>Name:</b><br /><br /><br /><b>Subject:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="name" name="name" placeholder="Enter your name" class="form-control input-md" type="text"><br />    
   <input id="name" name="subject" placeholder="Enter subject" class="form-control input-md" type="text">    

</div>
</div>
</div><!--End of row-->

<div class="row">
<div class="col-md-3"><b>E-Mail address:</b></div>
<div class="col-md-9">
<!-- Text input-->
<div class="form-group">
  <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">    
 </div>
</div>
</div><!--End of row-->

<div class="form-group"> 
<textarea rows="5" cols="8" name="feedback" class="form-control" placeholder="Write feedback here..."></textarea>
</div>
<div class="form-group" align="center">
<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
</div>
</form>';}?>
</div><!--col-md-6 end-->
<div class="col-md-3"></div></div>
</div></div>
</div><!--container end-->


<!--Footer start-->
<div class="row footer">
    <div class="col-md-3 box">
        <a href="#about" data-toggle="modal" data-target="#about_us">About us</a>
    </div>
    <div class="col-md-3 box">
        <a href="#" data-toggle="modal" data-target="#login">Admin Login</a></div>
    <div class="col-md-3 box">
        <a href="#" data-toggle="modal" data-target="#developers">Developers</a>
    </div>
    <div class="col-md-3 box">
        <a href="feedback.php" target="_blank">Feedback</a></div>
</div>
<div class="row mt-5 footer">  
                <!--Footer Start-->
          <div class="row text-light" style="background: rgba(0,0,0,0.4);">
            <div class="col-sm-3 text-light">
                <center>
                    <img src="QuizzHub1.png" style="height: 200px; width:200px; padding:10px;">
                </center>
            </div>
            <div class="col-sm-3">
                <h3><b class="text-center" style="color:white">USEFULL LINKS</b></h3>
                  <h4 style="color:green"><b>
                      <a href="index.php" style="text-decoration: none;" >Home</a>
                  </b></h4>
                  
                  <h4><b>
                      <a href="feedback.php" style="text-decoration: none;">Contact Us</a>
                  </b></h4>
                  <h4><b>
                      <a href="Admin_login.php" style="text-decoration: none;">Admin</a>
                  </b></h4>
                  <h4 style="color:green"><b>
                      <a href="feedback.php" style="text-decoration: none;" >Feedback</a>
                  </b></h4>
            </div>
            <div class="col-sm-3">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3606.8855106355313!2d83.05473771468596!3d25.308050383844737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398e30203b37db8b%3A0xab141428b11aaaeb!2sAmbition%20Institute%20of%20Technology%20(Best%20Polytechnic%20College%20%26%20Fashion%20Designing%20Institute%20Varanasi)!5e0!3m2!1sen!2sin!4v1650129707659!5m2!1sen!2sin" width="200" height="180" style="border:1px solid orange; margin-top:10px; border-radius:5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-sm-3">
                <h3><b style="color:white">CONTACT</b></h3>
                <h5 style="color: green;">
                    India , UP - Varanasi 221011
                </h5>
                <h5 style="color: green;">
                    E-mail : bsh08@gmail.com
                </h5>
                <h5 style="color: green;">Mob No : +91-9696063202</h5>
                <h5 style="color: green;">
                    Linkedin : BSH_Team
                </h5>
            </div>
<!-- Modal For About Us-->
<div class="modal fade title1" id="about_us">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange;font-size:35px; border-bottom:1px solid black;">About Us</span></h4>
            </div>

            <div class="modal-body">
                
                <div class="row">
                    <div class="col-md-4" style="margin-left:20px;">
                        <img src="QuizzHub1.png" width=170 height=170 alt="BSH Team"
                             class="img-rounded" style="margin-top: 20px;">
                    </div>
                    <div class="col-md-5" style="margin-left:40px; margin-top: -25px;">
                        <a href="#"
                           style="color:#202020;  font-family:'typo' ; font-size:18px" title="Find on Facebook"><h3><span style="border-bottom:2px solid #202020;">QuizzHub Website</span></h3></a>
                        <b style="color:#202020; font-family:'typo' ;font-size:16px ;text-align:justify;" class="title1">
                            These is a Quiz Platform website where every user can test its skills.
                            There are different - different Subjects which user can choose it and give a test 
                            within a given time slot and marks.
                        </b>
                    </div>
                </div><br/>
                <h5><b>
                    NOTE : User can first create its account and from there ,they can test  knowledge.
                    User can see its Rank among all users.
                </b></h5>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal For Developers-->
<div class="modal fade title1" id="developers">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Developers</span></h4>
            </div>

            <div class="modal-body">
                <p>
                <div class="row">
                    <div class="col-md-4" style="margin-left:20px;">
                        <img src="image/bhanu.jpg" width=150 height=200 alt="BSH Team"
                             class="img-rounded" style="margin-top: -20px;">
                    </div>
                    <div class="col-md-5" style="margin-left:40px;">
                        <a href="#"
                           style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">Bhanu Pratap Shukla</a>
                        <h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">+91-9696023202</h4>
                        <h4 style="font-family:'typo' ">bhanu588@gmail.com</h4>
                        <h4 style="font-family:'typo' ">Ambition Institute Of Technology, varanasi</h4>
                    </div>
                </div>
                <div class="row" style="padding-top:40px;margin-left:40px;">
                    <div class="col-md-4">
                    <a href="#"
                           style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">Shreya Vishwakarma</a>
                        <h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">+91-9325398180</h4>
                        <h4 style="font-family:'typo' ">shreya012@gmail.com</h4>
                        <h4 style="font-family:'typo' ">Ambition Institute Of Technology, varanasi</h4>
                    </div>
                    <div class="col-md-5" style="margin-left:40px;">
                    <img src="image/shreya.jpg" width=150 height=200 alt="BSH Team"
                             class="img-rounded" style="margin-top: -20px;">
                    </div>
                </div>
                <div class="row" style="padding-top:40px;margin-left:20px;">
                    <div class="col-md-4">
                    <img src="image/harsh.jpg" width=150 height=200 alt="BSH Team"
                             class="img-rounded" style="margin-top: -20px;">
                    </div>
                    <div class="col-md-5" style="margin-left:40px;">
                    <a href="#"
                           style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">Harsh Chaubey</a>
                        <h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">+91-9506213820</h4>
                        <h4 style="font-family:'typo' ">harsh08@gmail.com</h4>
                        <h4 style="font-family:'typo' ">Ambition Institute Of Technology, varanasi</h4>  </div>
                </div>
                </p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal for admin login-->
<div class="modal fade" id="login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title"><span style="color:orange;font-family:'typo' "><b style="font-size:30px;">LOGIN</b></span></h4>
            </div>
            <div class="modal-body title1" style="background:rgba(0,0,0,0.8);">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6" >
                        <form role="form" method="post" action="admin.php?q=index.php">
                            <div class="form-group">
                                <input type="text" name="uname" maxlength="20" placeholder="Admin user id"
                                       class="form-control" style="background:rgba(0,0,0,0.6); color:white; border:none; border-bottom:2px solid white;">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" maxlength="15" placeholder="Password"
                                       class="form-control" style="background:rgba(0,0,0,0.6); color:white; border:none; border-bottom:2px solid white;">
                            </div>
                            <div class="form-group" align="center">
                                <input type="submit" name="login" value="Login" class="btn btn-primary"/>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <!--<div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>-->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--footer end-->
</body>
</html>

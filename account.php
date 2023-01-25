<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project Worlds || TEST YOUR SKILL </title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>


    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <!--alert message-->
    <?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<!--alert message end-->

</head>
<?php
include_once 'dbConnection.php';
?>
<body>
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo"><b style="margin-top:10px; font-size:35px;">Test Your Skill</b></span></div>
<div class="col-md-4 col-md-offset-2">
 <?php
 include_once 'dbConnection.php';
session_start();
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];
$email=$_SESSION['email'];

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="account.php?q=1" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
}?>
</div>
</div></div>
<div class="bg">

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><b>Panel</b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> ><a href="account.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="account.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;History</a></li>
		<li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="account.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Ranking</a></li>
		<li class="pull-right"> <a href="logout.php?q=account.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Signout</a></li>
		</ul>
            <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter tag ">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Search</button>
      </form>
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">

<!--home start-->
<?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);	
if($rowcount == 0){
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</table></div></div>';

}?>
<!--<span id="countdown" class="timer"></span>
<script>
var seconds = 40;
    function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Buzz Buzz";
    } else {    
        seconds--;
    }
    }
var countdownTimer = setInterval('secondPassed()', 1000);
</script>-->

    <!--home closed-->

    <!--quiz start-->
    <?php
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
echo '<div class="panel" style="margin:5%">';
    while($row=mysqli_fetch_array($q) )
    {
    $qns=$row['qns'];
    $qid=$row['qid'];
    echo '<b>Question &nbsp;'.$sn.'&nbsp;::<br/>'.$qns.'</b><br/><br/>';
    }
    $q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " );
    echo '
    <form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"
          class="form-horizontal">
        <br/>';

        while($row=mysqli_fetch_array($q) )
        {
        $option=$row['option'];
        $optionid=$row['optionid'];
        echo'<input type="radio" name="ans" value="'.$optionid.'">'.$option.'<br/><br/>';
        }
        echo'<br/>
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit
        </button>
    </form>
    </div>';
    //header("location:dash.php?q=4&step=2&eid=$id&n=$total");
    }
    //result display
    if(@$_GET['q']== 'result' && @$_GET['eid'])
    {
    $eid=@$_GET['eid'];
    $q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157');
    echo '
    <div class="panel">
        <center><h1 class="title" style="color:#660033">Result</h1>
            <center><br/>
                <table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

                    while($row=mysqli_fetch_array($q) )
                    {
                    $s=$row['score'];
                    $w=$row['wrong'];
                    $r=$row['sahi'];
                    $qa=$row['level'];
                    echo '
                    <tr style="color:#66CCFF">
                        <td>Total Questions</td>
                        <td>'.$qa.'</td>
                    </tr>
                    <tr style="color:#99cc32">
                        <td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                        </td>
                        <td>'.$r.'</td>
                    </tr>
                    <tr style="color:red">
                        <td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                        </td>
                        <td>'.$w.'</td>
                    </tr>
                    <tr style="color:#66CCFF">
                        <td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td>
                        <td>'.$s.'</td>
                    </tr>
                    ';
                    }
                    $q=mysqli_query($con,"SELECT * FROM rank WHERE email='$email' " )or die('Error157');
                    while($row=mysqli_fetch_array($q) )
                    {
                    $s=$row['score'];
                    echo '
                    <tr style="color:#990000">
                        <td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td>
                        <td>'.$s.'</td>
                    </tr>
                    ';
                    }
                    echo '
                </table>
    </div>
    ';

    }
    ?>
    <!--quiz end-->
    <?php
//history start
if(@$_GET['q']== 2) 
{
$q=mysqli_query($con,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC " )or die('Error197');
echo  '<div class="panel title">
    <table class="table table-striped title1">
        <tr style="color:red">
            <td><b>S.N.</b></td>
            <td><b>Quiz</b></td>
            <td><b>Question Solved</b></td>
            <td><b>Right</b></td>
            <td><b>Wrong<b></td>
            <td><b>Score</b></td>
            ';
            $c=0;
            while($row=mysqli_fetch_array($q) )
            {
            $eid=$row['eid'];
            $s=$row['score'];
            $w=$row['wrong'];
            $r=$row['sahi'];
            $qa=$row['level'];
            $q23=mysqli_query($con,"SELECT title FROM quiz WHERE eid='$eid' " )or die('Error208');
            while($row=mysqli_fetch_array($q23) )
            {
            $title=$row['title'];
            }
            $c++;
            echo '
        <tr>
            <td>'.$c.'</td>
            <td>'.$title.'</td>
            <td>'.$qa.'</td>
            <td>'.$r.'</td>
            <td>'.$w.'</td>
            <td>'.$s.'</td>
        </tr>
        ';
        }
        echo'
    </table>
    </div>';
    }

    //ranking start
    if(@$_GET['q']== 3)
    {
    $q=mysqli_query($con,"SELECT * FROM rank ORDER BY score DESC " )or die('Error223');
    echo '
    <div class="panel title">
        <div class="table-responsive">
            <table class="table table-striped title1">
                <tr style="color:red">
                    <td><b>Rank</b></td>
                    <td><b>Name</b></td>
                    <td><b>Gender</b></td>
                    <td><b>College</b></td>
                    <td><b>Score</b></td>
                </tr>
                ';
                $c=0;
                while($row=mysqli_fetch_array($q) )
                {
                $e=$row['email'];
                $s=$row['score'];
                $q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
                while($row=mysqli_fetch_array($q12) )
                {
                $name=$row['name'];
                $gender=$row['gender'];
                $college=$row['college'];
                }
                $c++;
                echo '
                <tr>
                    <td style="color:#99cc32"><b>'.$c.'</b></td>
                    <td>'.$name.'</td>
                    <td>'.$gender.'</td>
                    <td>'.$college.'</td>
                    <td>'.$s.'</td>
                    <td>';
                        }
                        echo '
            </table>
        </div>
    </div>
    ';}
    ?>


    </div></div></div></div>
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

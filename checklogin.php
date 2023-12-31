
<!DOCTYPE html>

<html>
<head>
<title>online voting</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script language="JavaScript" src="js/user.js">
</script>
</head>
<body id="top">
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <div class="fl_left">
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-pinterest" href="https://uk.pinterest.com/"><i class="fa fa-pinterest"></i></a></li>
        <li><a class="faicon-twitter" href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
        <li><a class="faicon-dribble" href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
        <li><a class="faicon-linkedin" href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
        <li><a class="faicon-google-plus" href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="faicon-rss" href="https://www.rss.com/"><i class="fa fa-rss"></i></a></li>
      </ul>
    </div>
  </div>
</div>
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="index.php">ONLINE VOTING</a></h1>
    </div>
	<nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="checklogin.php">Home</a></li>
        <li><a class="drop" href="#">Voter Panel</a>
          <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="registeracc.php">Registration</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
</div>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
  <section id="testimonials" class="hoc container clear"> 
    <h2 class="font-x3 uppercase btmspace-80 underlined"> Online <a href="#">Voting</a></h2>
    <ul class="nospace group">
      <li class="one_half">
      	<div >
		<h1>Invalid Credentials Provided </h1>
		</div>
		<div>
		<?php
			ini_set ("display_errors", "1");
			error_reporting(E_ALL);
			ob_start();
			session_start();
			require_once('connection.php');
			$myusername=$_POST['myusername'];
			$mypassword=$_POST['mypassword'];
			$encrypted_mypassword=md5($mypassword);
			$myusername = stripslashes($myusername);
			$mypassword = stripslashes($mypassword);
			$myusername = $mysqli->escape_string($_POST['myusername']);
			$mypassword = $mysqli->escape_string($_POST['mypassword']);

			$sql="SELECT * FROM tbmembers WHERE email='$myusername' and password='$encrypted_mypassword'" or die(mysqli_error());
			$result= $mysqli->query($sql) or die(mysqli_error());
			$count=mysqli_num_rows($result);
			if($count==1){
				$user = mysqli_fetch_assoc($result);
				$_SESSION['member_id'] = $user['member_id'];
				header("location:voter.php");
			}
			else {
				echo "Wrong Username or Password<br><br>Return to <a href=\"login.php\">Login</a>";
			}
			ob_end_flush();
		?> 
		</div> 
      </li>
    </ul>
  </section>
</div>
<div class="wrapper row4">
 <footer id="footer" class="hoc clear"> 

    <div class="clear"></div>

    <div class="one_third first">
        <h6 class="title">Online Voting System</h6>
        <ul class="nospace linklist contact">
            <li><i class="fa fa-globe"></i> Website: <a href="http://yourvotingsite.com">yourvotingsite.com</a></li>
            <li><i class="fa fa-users"></i> Support: support@yourvotingsite.com</li>
            <li><i class="fa fa-shield"></i> Security: security@yourvotingsite.com</li>
            <li><i class="fa fa-file-text-o"></i> Terms of Service: <a href="http://yourvotingsite.com/terms">Terms</a></li>
        </ul>
    </div>
    <div class="one_third">
        <h6 class="title">Social Media</h6>
        <ul class="nospace linklist contact">
            <li><i class="fa fa-facebook"></i> <a href="https://www.facebook.com/yourvotingsite">Facebook</a></li>
            <li><i class="fa fa-twitter"></i> <a href="https://twitter.com/yourvotingsite">Twitter</a></li>
            <li><i class="fa fa-linkedin"></i> <a href="https://www.linkedin.com/company/yourvotingsite">LinkedIn</a></li>
        </ul>
    </div>

    <div class="one_third">
        <h6 class="title">Support</h6>
        <ul class="nospace linklist contact">
            <li><i class="fa fa-life-ring"></i> Help Center: <a href="http://yourvotingsite.com/help">Help Center</a></li>
            <li><i class="fa fa-envelope-o"></i> General Inquiries: info@yourvotingsite.com</li>
            <li><i class="fa fa-comments-o"></i> Feedback: feedback@yourvotingsite.com</li>
        </ul>
    </div>
</footer>
</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_left">Copyright &copy; 2023 - All Rights Reserved - <a href="#">online_voting_system</a></p>
  </div>
</div>
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.placeholder.min.js"></script>
</body>
</html>


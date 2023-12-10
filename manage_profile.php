<?php
    session_start();
    require('connection.php');
    if(empty($_SESSION['member_id'])){
      header("location:access-denied.php");
    } 
    $result= $mysqli->query("SELECT * FROM tbMembers WHERE member_id = '$_SESSION[member_id]'")
    or die("There are no records to display ... \n" . mysqli_error()); 
    if (mysqli_num_rows($result)<1){
        $result = null;
    }
    $row = mysqli_fetch_array($result);
    if($row)
     {
         $stdId = $row['member_id'];
         $firstName = $row['first_name'];
         $lastName = $row['last_name'];
         $email = $row['email'];
         $voter_id = $row['voter_id'];
     }
?>
<?php
    if (isset($_POST['update'])){
        $myId = addslashes( $_GET[id]);
        $myFirstName = addslashes( $_POST['firstname'] ); 
        $myLastName = addslashes( $_POST['lastname'] );
        $myEmail = $_POST['email'];
        $myPassword = $_POST['password'];
        $myVoterid = $_POST['voter_id'];
        $newpass = md5($myPassword);
        $sql = $mysqli->query( "UPDATE tbMembers SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail', voter_id = '$myVoterid', password='$newpass' WHERE member_id = '$myId'" )
                or die( mysqli_error() );
         header("Location: manage-profile.php");
    }
?>




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
      <h1><a href="index.html">ONLINE VOTING</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="voter.php">Home</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>
<div class="wrapper bgded overlay" style="background-image:url('https://img.freepik.com/free-vector/realistic-background-futuristic-style_23-2149129125.jpg?w=1380&t=st=1700594193~exp=1700594793~hmac=9b304d483aab93f8f06d1f2f382e7099e642e8c90f86a53a6a66430d52037206');">
  <section id="testimonials" class="hoc container clear"> 
    <h2 class="font-x3 uppercase btmspace-80 underlined"> Online <a href="#">Voting</a></h2>
    <ul class="nospace group">
      <li class="one_half first">
        <blockquote>
            <table border="0" width="620" align="center">
            <CAPTION><h3>MY PROFILE</h3></CAPTION>
            <form>
            <br>
            <tr><td></td><td></td></tr>
            <tr>
                <td style="color:#000000"; >Id:</td>
                <td style="color:#000000"; ><?php echo $stdId; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >First Name:</td>
                <td style="color:#000000"; ><?php echo $firstName; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Last Name:</td>
                <td style="color:#000000"; ><?php echo $lastName; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Email:</td>
                <td style="color:#000000"; ><?php echo $email; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Voter Id:</td>
                <td style="color:#000000"; ><?php echo $voter_id; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Password:</td>
                <td style="color:#000000"; >Encrypted</td>
            </tr>
            </table>
            </form>

        </blockquote>
      
      </li>
      <li class="one_half">
        <blockquote>
            <table  border="0" width="620" align="center">
            <CAPTION><h3>UPDATE PROFILE</h3></CAPTION>
            <form action="manage-profile.php?id=<?php echo $_SESSION['member_id']; ?>" method="post" onsubmit="return updateProfile(this)">
            <table align="center">
            <tr><td  style="background-color:#0000ff"  >First Name:</td><td style="background-color:#0000ff"  ><input  style="color:#000000"; type="text" font-weight:bold;" name="firstname" maxlength="15" value=""></td></tr>

            <tr><td style="background-color:#bf00ff">Last Name:</td><td style="background-color:#bf00ff"><input style="color:#000000";  type="text" font-weight:bold;" name="lastname" maxlength="15" value=""></td></tr>

            <tr><td style="background-color:#0000ff" >Email Address:</td><td style="background-color:#0000ff"><input style="color:#000000";  type="text" font-weight:bold;" name="email" maxlength="100" value=""></td></tr>

            <tr><td style="background-color:#bf00ff" >Voter Id:</td><td style="background-color:#bf00ff"><input  style="color:#000000";  type="text"  font-weight:bold;" name="voter_id" maxlength="100" value=""></td></tr>

            <tr><td style="background-color:#0000ff" >New Password:</td><td style="background-color:#0000ff" ><input  style="color:#000000";  type="password" font-weight:bold;" name="password" maxlength="15" value=""></td></tr>

            <tr><td style="background-color:#bf00ff" >Confirm New Password:</td><td style="background-color:#bf00ff" ><input   style="color:#000000";  type="password"  font-weight:bold;" name="ConfirmPassword" maxlength="15" value=""></td></tr>

            <tr><td style="background-color:#0000ff" >&nbsp;</td></td><td style="background-color:#0000ff" ><input style="color:#ff0000";  type="submit" name="update" value="Update Profile"></td></tr>

            </table>
            </form>
            </table>



        </blockquote>
      
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



<?php
require_once('connection.php');
session_start();

if (empty($_SESSION['member_id'])) {
    header("location:access-denied.php");
}

$positions = $mysqli->query("SELECT * FROM tbPositions")
    or die("There are no records to display ... \n" . mysqli_error());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Vote</title>
    <link rel="stylesheet" href="style1.css">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <script language="JavaScript" src="js/user.js"></script>
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
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a class="drop" href="#">Pages</a>
                        <ul>
                            <li><a href="admin/index.php">Admin</a></li>
                            <li><a href="login.php">Voter</a></li>

                        </ul>
                    </li>
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

    <div class="k">
        <h1>Welcome to the Voting System</h1>
        <p>Select candidates for each position:</p>
    </div>

    <form action="submit_vote.php" method="post">
        <div class="flex-container" align-items="center">
            <?php while ($row = mysqli_fetch_array($positions)) : ?>
                <div class="position-section">
                    <h2><?php echo $row['position_name']; ?></h2>
                    <input type="hidden" name="position_id[]" value="<?php echo $row['position_id']; ?>">
                    <?php
                    $position = addslashes($row['position_name']);
                    $candidates = $mysqli->query("SELECT * FROM tbCandidates WHERE candidate_position='$position'")
                        or die("There are no records at the moment ... \n");

                    while ($candidate = mysqli_fetch_array($candidates)) : ?>
                        <div class="candidate-box">
                            <div class="image-container">
                                <img src="<?php echo $candidate['candidate_image']; ?>" alt="<?php echo $candidate['candidate_name']; ?>" class="candidate-image">
                            </div>
                            <div class="candidate-info">
                                <p><?php echo $candidate['candidate_name']; ?></p>
                                <button type="submit" name="SubmitVote" value="<?php echo $candidate['candidate_id']; ?>" class="vote-button">
                                    Vote for <?php echo $row['position_name']; ?>
                                </button>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endwhile; ?>
           
        </div>
    </form>


    <div class="wrapper row4">
        <footer id="footer" class="hoc clear">
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

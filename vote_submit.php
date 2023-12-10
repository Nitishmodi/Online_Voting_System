<?php
require_once('connection.php');
session_start();

if (empty($_SESSION['member_id'])) {
    header("location:access-denied.php");
    exit();
}
if (isset($_POST['SubmitVote'])) {
    $candidate_id = $_POST['SubmitVote'];
    $position_id = $_POST['position_id'];

    if (!empty($candidate_id) && is_numeric($candidate_id)) {
        $updateQuery = "UPDATE tbcandidates SET candidate_cvotes = candidate_cvotes + 1 WHERE candidate_id = $candidate_id";

        if ($mysqli->query($updateQuery)) {
            header("location:thank_you.php");
            exit();
        } else {
            echo "Error: " . $mysqli->error;
        }
    } else {
        echo "Invalid candidate ID.";
    }
}
?>

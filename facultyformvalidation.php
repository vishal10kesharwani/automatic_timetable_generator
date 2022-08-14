<?php
/**
 * Created by PhpStorm.
 * User: MSaqib
 * Date: 02-09-2016
 * Time: 23:29
 */
session_start();
include 'connection.php';
if (isset($_POST['FN'])) {
    $fac = $_POST['FN'];
} else {
    die();
}
$q = mysqli_query(mysqli_connect("sql107.epizy.com", "epiz_30859803", "aSf8C7EAurB2rs", "epiz_30859803_ttms"), "SELECT name FROM teachers WHERE faculty_number = '$fac'");
if (mysqli_num_rows($q) == 1) {
    $row = mysqli_fetch_assoc($q);
    $_SESSION['loggedin_name'] = $row['name'];
    $_SESSION['loggedin_id'] = $fac;
    header("Location:facultypage.php");
} else {
    $message = "Username incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";

}
if (mysqli_num_rows($q) == 1) {
    $row = mysqli_fetch_assoc($q);
    echo 'welcome ' . $row['name'];
} else {
    $message = "Invalid Faculty Number.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message'); window.location.replace('index.php');</script>";

}
?>
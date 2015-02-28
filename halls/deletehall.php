<?php


$hall_id=$_GET['hall_id'];


require_once('../mysqli_connect.php');

$query = "DELETE FROM halls WHERE hall_id='$hall_id'";

$stmt = mysqli_prepare($dbc, $query);

mysqli_stmt_execute($stmt);

$affected_rows = mysqli_stmt_affected_rows($stmt);

if($affected_rows == 1) {

    header('Location: gethallinfo.php');
}

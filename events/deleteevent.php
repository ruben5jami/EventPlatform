<?php


$event_id=$_GET['event_id'];


require_once('../mysqli_connect.php');

$query = "DELETE FROM events WHERE event_id='$event_id'";

$stmt = mysqli_prepare($dbc, $query);

mysqli_stmt_execute($stmt);

$affected_rows = mysqli_stmt_affected_rows($stmt);

if($affected_rows == 1) {

    header('Location: geteventinfo.php');
}

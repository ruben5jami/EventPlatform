<?php


$job_id=$_GET['job_id'];


require_once('../mysqli_connect.php');

$query = "DELETE FROM jobs WHERE job_id='$job_id'";

$stmt = mysqli_prepare($dbc, $query);

mysqli_stmt_execute($stmt);

$affected_rows = mysqli_stmt_affected_rows($stmt);

if($affected_rows == 1) {

    header('Location: getjobinfo.php');
}

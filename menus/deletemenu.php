<?php


$menu_id=$_GET['menu_id'];


require_once('../mysqli_connect.php');

$query = "DELETE FROM menus WHERE menu_id='$menu_id'";

$stmt = mysqli_prepare($dbc, $query);

mysqli_stmt_execute($stmt);

$affected_rows = mysqli_stmt_affected_rows($stmt);

if($affected_rows == 1) {

    header('Location: getmenuinfo.php');
}

<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php

// Get a connection for the database
require_once('mysqli_connect.php');

if(isset($_POST['submit'])) {

    $data_missing = array();


    if (empty($_POST['menu_id'])) {

        // Adds name to array
        $data_missing[] = 'menu id';

    } else {

        // Trim white space from the name and store the name
        $m_id = trim($_POST['menu_id']);

    }

    if (empty($_POST['dish_id'])) {

        // Adds name to array
        $data_missing[] = 'dish id';

    } else {

        // Trim white space from the name and store the name
        $d_id = trim($_POST['dish_id']);

    }

}



// Create a query for the database
$query = "INSERT INTO menus_have_dishes (menu_id, dish_id) VALUES (?, ?) ";
//add from form

$stmt = mysqli_prepare($dbc, $query);


mysqli_stmt_bind_param($stmt, "ii", $m_id, $d_id);

mysqli_stmt_execute($stmt);


// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);
$affected_rows = mysqli_stmt_affected_rows($stmt);

if($affected_rows == 1){

    echo 'Dish Entered';


    mysqli_stmt_close($stmt);

    mysqli_close($dbc);

} else {

    echo "Error Occurred<br />";

    mysqli_stmt_close($stmt);

    mysqli_close($dbc);

}



<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Number Of Events</h1>
<?php
// Get a connection for the database
require_once('mysqli_connect.php');


if(isset($_POST['submit'])) {

    $data_missing = array();


    if (empty($_POST['from'])) {

        // Adds name to array
        $data_missing[] = 'from';

    } else {

        // Trim white space from the name and store the name
        $from = trim($_POST['from']);

    }

    if (empty($_POST['to'])) {

        // Adds name to array
        $data_missing[] = 'to';

    } else {

        // Trim white space from the name and store the name
        $to = trim($_POST['to']);

    }

}

$query = "SELECT COUNT(reservation_id) as num FROM reservations
                WHERE reservation_date BETWEEN '".$from."' AND '".$to."';";
$results = $dbc->query($query);

if($results==FALSE){
    die(mysql_error());
}else {

    $rows = $results->fetch_assoc();
    echo "<h3>Number Of Events Between ".$from ." TO ".$to."</h3>";
    echo "<h2>".$rows['num']."</h2>";
}


mysqli_close($dbc);


<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Reservation By Periods</h1>
<?php
// Get a connection for the database
require_once('mysqli_connect.php');

// Create a query for the database

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


$query = "SELECT reservation_id, reservation_date FROM reservations
            WHERE reservation_date BETWEEN '".$from."' AND '".$to."';";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table  class="table table-striped"><thead>

	<tr><td align="left"><b>Reservation ID</th>
	<th align="left">Reservation Date</th></tr></thead><tbody>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
            $row['reservation_id'] . '</td><td align="left">' .
            $row['reservation_date'] . '</td>';

        echo '</tr>';
    }

    echo '</tbody></table>';




} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);


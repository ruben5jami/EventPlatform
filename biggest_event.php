<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Biggest Event</h1>
<?php
// Get a connection for the database
require_once('mysqli_connect.php');

// Create a query for the database
$query = "SELECT reservation_id, reservation_date, reservation_hall_id, reservation_invited, reservation_client_id
            FROM reservations WHERE reservation_invited=(SELECT max(reservation_invited) FROM reservations);";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table  class="table table-striped"><thead>

	<tr><td align="left"><b>Reservation ID</th>
	<th align="left">Reservation Date</th>
	<th align="left">Hall ID</th>
	<th align="left">Number Of Invited</th>
	<th align="left">Client ID</th></tr></thead><tbody>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
            $row['reservation_id'] . '</td><td align="left">' .
            $row['reservation_date'] . '</td><td align="left">' .
            $row['reservation_hall_id'] . '</td><td align="left">' .
            $row['reservation_invited'] . '</td><td align="left">' .
            $row['reservation_client_id'] . '</td>';

        echo '</tr>';
    }

    echo '</tbody></table>';

} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);


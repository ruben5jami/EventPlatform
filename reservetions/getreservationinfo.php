<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Reservation List</h1>
<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

// Create a query for the database
$query = "SELECT reservation_id, reservation_date, reservation_employee_took ,reservation_invited,
                reservation_hall_id, reservation_menu_id, reservation_event_id, reservation_client_id FROM reservations";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table  class="table table-striped"><thead>

	<tr><td align="left"><b>Reservation ID</th>
	<th align="left">Reservation Date</th>
	<th align="left">Who Took Reservation</th>
	<th align="left">Number Of People</th>
	<th align="left">Hall ID</th>
	<th align="left">Menu ID</th>
	<th align="left">Event ID</th>
	<th align="left">Client ID</th>
    <th align="left">delete</th>
	</tr></thead><tbody>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
            $row['reservation_id'] . '</td><td align="left">' .
            $row['reservation_date'] . '</td><td align="left">' .
            $row['reservation_employee_took'] . '</td><td align="left">' .
            $row['reservation_invited'] . '</td><td align="left">' .
            $row['reservation_hall_id'] . '</td><td align="left">' .
            $row['reservation_menu_id'] . '</td><td align="left">' .
            $row['reservation_event_id'] . '</td><td align="left">' .
            $row['reservation_client_id'] . '</td>';
        echo '<td><a href=deletereservation.php?reservation_id='.$row['reservation_id'] . '>delete</a> </td>';
        echo '</tr>';
    }

    echo '</tbody></table>';


    echo "<h2><a href='addreservation.php'>Add another</a></h2>" ;

} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);
?>
</body>
</html>

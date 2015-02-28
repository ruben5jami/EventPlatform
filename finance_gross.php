<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<h1>GROSS Finance</h1>
<?php
// Get a connection for the database
require_once('mysqli_connect.php');

// Create a query for the database
$query = "SELECT reservation_invited, reservation_menu_id FROM reservations;";
$sum = 0;

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table  class="table table-striped"><thead>

	<tr><td align="left"><b>Reservation invited</th>
	<th align="left">Menu price</th>
	<th align="left">Total per Event</th></tr></thead><tbody>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

        $query2 = "SELECT menu_price FROM menus WHERE menu_id=". $row['reservation_menu_id'] .";";

        $response2 = @mysqli_query($dbc, $query2);
        $row2 = mysqli_fetch_array($response2);
        $event =  $row['reservation_invited'] *  $row2['menu_price'];
        $sum = $sum + $event;
        echo '<tr><td align="left">' .
            $row['reservation_invited'] . '</td><td align="left">' .
            $row2['menu_price'] . '</td><td align="left">' .
            $event . '</td>';



        echo '</tr>';
    }

    echo '</tbody></table>';
    echo '<h1>Total Gross: '.$sum.'$</h1>';


} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);



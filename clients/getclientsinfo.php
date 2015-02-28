<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>
<body>
<h1>Client List</h1>
<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

// Create a query for the database
$query = "SELECT client_id, client_name, client_address,
	 client_phone FROM clients";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table  class="table table-striped"><thead>

	<tr><td align="left"><b>Client ID</th>
	<th align="left">Client Name</th>
	<th align="left">Client Address</th>
	<th align="left">Client Phone</th>
	<th align="left">delete</th></tr></thead><tbody>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
            $row['client_id'] . '</td><td align="left">' .
            $row['client_name'] . '</td><td align="left">' .
            $row['client_address'] . '</td><td align="left">' .
            $row['client_phone'] . '</td>';
        echo '<td><a href=deleteclient.php?client_id='.$row['client_id'] . '>delete</a> </td>';

        echo '</tr>';
    }

    echo '</tbody></table>';


    echo "<h2><a href='addclient.php'>Add another</a></h2>" ;

} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);


<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Menus List</h1>
<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

// Create a query for the database
$query = "SELECT menu_id, menu_name, menu_price FROM menus";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table  class="table table-striped"><thead>

	<tr><td align="left"><b>Menu ID</th>
	<th align="left">Menu Name</th>
	<th align="left">Menu Price</th>
	<th align="left">delete</th></tr></thead><tbody>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
            $row['menu_id'] . '</td><td align="left">' .
            $row['menu_name'] . '</td><td align="left">' .
            $row['menu_price'] . '</td>';
        echo '<td><a href=deletemenu.php?menu_id='.$row['menu_id'] . '>delete</a> </td>';
        echo '</tr>';
    }

    echo '</tbody></table>';


    echo "<h2><a href='addmenu.php'>Add another</a></h2>" ;

} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);


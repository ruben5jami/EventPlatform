<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Menus With Dishes</h1>
<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

// Create a query for the database
$query = "SELECT menus.menu_id, menus.menu_name, menus_have_dishes.dish_id, dishes.dish_name
            FROM menus
	          JOIN menus_have_dishes
    	        ON menus.menu_id=menus_have_dishes.menu_id
                  JOIN dishes
    	            ON dishes.dish_id=menus_have_dishes.dish_id
    	            ORDER BY menus.menu_id;";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table  class="table table-striped"><thead>

	<tr><td align="left"><b>Menu ID</th>
	<th align="left">Menu Name</th>
	<th align="left">Dishe ID</th>
	<th align="left">Dish Name</th></tr></thead><tbody>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
            $row['menu_id'] . '</td><td align="left">' .
            $row['menu_name'] . '</td><td align="left">' .
            $row['dish_id'] . '</td>';
        echo '<td>'.$row['dish_name'] .'</td>';
        echo '</tr>';
    }

    echo '</tbody></table>';


} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);


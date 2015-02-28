
<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['event_id'])){

        // Adds name to array
        $data_missing[] = 'event Id';

    } else{

        // Trim white space from the name and store the name
        $ev_id= trim($_POST['event_id']);

    }

    if(empty($_POST['event_name'])){

        // Adds name to array
        $data_missing[] = 'event Name';

    } else{

        // Trim white space from the name and store the name
        $ev_name = trim($_POST['event_name']);

    }



    if(empty($data_missing)){

        require_once('../mysqli_connect.php');

        $query = "INSERT INTO events (event_id, event_name) VALUES (?, ?)";

        $stmt = mysqli_prepare($dbc, $query);


        mysqli_stmt_bind_param($stmt, "is", $ev_id, $ev_name);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Event Entered';


            echo "<br><p><a href='addevent.php'>Add another</a></p>" ;

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo "Error Occurred<br />";

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        }

    } else {

        echo 'You need to enter the following data<br />';

        foreach($data_missing as $missing){

            echo "$missing<br />";

        }

    }

}


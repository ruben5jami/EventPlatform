
<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['hall_id'])){

        // Adds name to array
        $data_missing[] = 'hall Id';

    } else{

        // Trim white space from the name and store the name
        $h_id = trim($_POST['hall_id']);

    }

    if(empty($_POST['hall_name'])){

        // Adds name to array
        $data_missing[] = 'hall Name';

    } else{

        // Trim white space from the name and store the name
        $h_name = trim($_POST['hall_name']);

    }

    if(empty($_POST['hall_capacity'])){

        // Adds name to array
        $data_missing[] = 'hall capacity';

    } else {

        // Trim white space from the name and store the name
        $h_capacity = trim($_POST['hall_capacity']);

    }



    if(empty($data_missing)){

        require_once('../mysqli_connect.php');

        $query = "INSERT INTO halls (hall_id, hall_name, hall_capacity) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);


        mysqli_stmt_bind_param($stmt, "isi", $h_id, $h_name, $h_capacity);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Hall Entered';


            echo "<br><p><a href='addhall.php'>Add another</a></p>" ;

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


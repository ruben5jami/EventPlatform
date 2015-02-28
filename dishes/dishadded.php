
<?php

if(isset($_POST['submit'])){

    $data_missing = array();


    if(empty($_POST['dish_id'])){

        // Adds name to array
        $data_missing[] = 'dish Id';

    } else{

        // Trim white space from the name and store the name
        $d_id = trim($_POST['dish_id']);

    }

    if(empty($_POST['dish_name'])){

        // Adds name to array
        $data_missing[] = 'dish Name';

    } else{

        // Trim white space from the name and store the name
        $d_name = trim($_POST['dish_name']);

    }

    if(empty($_POST['dish_description'])){

        // Adds name to array
        $data_missing[] = 'dish description';

    } else {

        // Trim white space from the name and store the name
        $d_description = trim($_POST['dish_description']);

    }

    if(empty($_POST['dish_photo'])){

        // Adds name to array
        $data_missing[] = 'dish photo';

    } else {

        // Trim white space from the name and store the name
        $d_photo = trim($_POST['dish_photo']);

    }


    if(empty($data_missing)){

        require_once('../mysqli_connect.php');

        $query = "INSERT INTO dishes (dish_id, dish_name, dish_description,
        dish_photo) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);


        mysqli_stmt_bind_param($stmt, "isss", $d_id, $d_name, $d_description, $d_photo);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Dish Entered';

            echo "<br><p><a href='adddish.php'>Add another</a></p>" ;

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


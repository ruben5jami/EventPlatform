
<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['menu_id'])){

        // Adds name to array
        $data_missing[] = 'menu Id';

    } else{

        // Trim white space from the name and store the name
        $m_id = trim($_POST['menu_id']);

    }

    if(empty($_POST['menu_name'])){

        // Adds name to array
        $data_missing[] = 'menu Name';

    } else{

        // Trim white space from the name and store the name
        $m_name = trim($_POST['menu_name']);

    }

    if(empty($_POST['menu_price'])){

        // Adds name to array
        $data_missing[] = 'menu price';

    } else {

        // Trim white space from the name and store the name
        $m_price = trim($_POST['menu_price']);

    }


    if(empty($data_missing)){

        require_once('../mysqli_connect.php');

        $query = "INSERT INTO menus (menu_id, menu_name, menu_price) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);


        mysqli_stmt_bind_param($stmt, "ss", $m_id, $m_name, $m_price);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Menu Entered';


            echo "<br><p><a href='addmenu.php'>Add another</a></p>" ;

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



<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['job_id'])){

        // Adds name to array
        $data_missing[] = 'job id';

    } else{

        // Trim white space from the name and store the name
        $j_id= trim($_POST['job_id']);

    }


    if(empty($data_missing)){

        require_once('../mysqli_connect.php');

        $query = "INSERT INTO jobs (job_id, job_description) VALUES (?, ?)";

        $stmt = mysqli_prepare($dbc, $query);


        mysqli_stmt_bind_param($stmt, "is",$j_id, $j_description);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Job Entered';


            echo "<br><p><a href='addjob.php'>Add another</a></p>" ;

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


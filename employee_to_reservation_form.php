<html>
<head>
    <title>Add dish</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="form.css">
</head>
<body>
<div class="container">
    <h2>Who Works Where?</h2>
    <form action="employee_to_reservation.php" method="post">
        <?php
        // Get a connection for the database
        require_once('mysqli_connect.php'); ?>
        <p  class="form-group">Reservation ID:
            <select name="reservation_id" class="form-control" >
                <?php
                $query = "SELECT reservation_id FROM reservations";
                $response = @mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($response)){

                    echo '<option>'. $row['reservation_id'].'</option>';

                }?>
            </select>
        </p>

        <p  class="form-group">Employee ID:
            <select name="employee_id1" class="form-control" >
                <?php
                $query = "SELECT employee_id, employee_first_name FROM employees";
                $response = @mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($response)){

                    echo '<option value='.$row['employee_id'].'>'. $row['employee_id'].' - '.$row['employee_first_name'].'</option>';

                }?>
            </select>
        </p>

        <p  class="form-group">Employee ID:
            <select name="employee_id2" class="form-control" >
                <?php
                $query = "SELECT employee_id, employee_first_name FROM employees";
                $response = @mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($response)){

                    echo '<option value='.$row['employee_id'].'>'. $row['employee_id'].' - '.$row['employee_first_name'].'</option>';

                }?>
            </select>
        </p>

        <p  class="form-group">Employee ID:
            <select name="employee_id3" class="form-control" >
                <?php
                $query = "SELECT employee_id, employee_first_name FROM employees";
                $response = @mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($response)){

                    echo '<option value='.$row['employee_id'].'>'. $row['employee_id'].' - '.$row['employee_first_name'].'</option>';

                }?>
            </select>
        </p>

        <p  class="form-group">Employee ID:
            <select name="employee_id4" class="form-control" >
                <?php
                $query = "SELECT employee_id, employee_first_name FROM employees";
                $response = @mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($response)){

                    echo '<option value='.$row['employee_id'].'>'. $row['employee_id'].' - '.$row['employee_first_name'].'</option>';

                }?>
            </select>
        </p>

        <p  class="form-group">Employee ID:
            <select name="employee_id5" class="form-control" >
                <?php
                $query = "SELECT employee_id, employee_first_name FROM employees";
                $response = @mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($response)){

                    echo '<option value='.$row['employee_id'].'>'. $row['employee_id'].' - '.$row['employee_first_name'].'</option>';

                }?>
            </select>
        </p>

        <p  class="form-group">Employee ID:
            <select name="employee_id6" class="form-control" >
                <?php
                $query = "SELECT employee_id, employee_first_name FROM employees";
                $response = @mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($response)){

                    echo '<option value='.$row['employee_id'].'>'. $row['employee_id'].' - '.$row['employee_first_name'].'</option>';

                }?>
            </select>
        </p>
        <p>
            <input type="submit" name="submit" value="Send" class="btn btn-default" />
        </p>

    </form>
</div>
</body>
</html>
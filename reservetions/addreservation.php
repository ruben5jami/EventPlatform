<html>
<head>
    <title>Add Reservation</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../form.css">
</head>
<body>
<div class="container">
<h2>Add a New Reservation</h2>
    <?php
    // Get a connection for the database
    require_once('../mysqli_connect.php'); ?>
<form action="reservationadded.php" method="post">

    <p class="form-group">Reservation ID:
        <input type="number" name="reservation_id" size="30" value="" class="form-control" />
    </p>

    <p class="form-group">Reservation Date:
        <input type="date" name="reservation_date" size="30" value="" class="form-control" />
    </p>

    <p class="form-group">Who Took The Reservation:
        <select name="reservation_employee_took" class="form-control" >
        <?php
        $query = "SELECT employee_id, employee_first_name FROM employees";
        $response = @mysqli_query($dbc, $query);
        while($row = mysqli_fetch_array($response)){

            echo '<option value='. $row['employee_id'].'>'. $row['employee_id']." - ". $row['employee_first_name'].'</option>';

        }?>
        </select>
    </p>


    <p class="form-group">Reservation Number Of People Invited:
        <input type="number" name="reservation_invited" size="30" value="" class="form-control" />

    </p>

    <p class="form-group">Reservation Hall ID:
        <select name="reservation_hall_id"  class="form-control">
        <?php
        $query = "SELECT hall_id, hall_name FROM halls";
        $response = @mysqli_query($dbc, $query);
        while($row = mysqli_fetch_array($response)){

            echo '<option value='. $row['hall_id'].'>'. $row['hall_id']." - ". $row['hall_name'].'</option>';

        }?>
        </select>
    </p>

    <p class="form-group">Reservation Menu ID:
        <select  name="reservation_menu_id" class="form-control">
        <?php
        $query = "SELECT menu_id, menu_name FROM menus";
        $response = @mysqli_query($dbc, $query);
        while($row = mysqli_fetch_array($response)){

            echo '<option value='. $row['menu_id'].'>'. $row['menu_id']." - ". $row['menu_name'].'</option>';

        }?>
        </select>
    </p>

    <p class="form-group">Reservation Event Id:
        <select name="reservation_event_id"  class="form-control" >
        <?php
        $query = "SELECT event_id, event_name FROM events";
        $response = @mysqli_query($dbc, $query);
        while($row = mysqli_fetch_array($response)){

            echo '<option value='. $row['event_id'].'>'. $row['event_id']." - ". $row['event_name'].'</option>';

        }?>
        </select>
    </p>

    <p class="form-group">Reservation Client ID:
        <select  name="reservation_client_id" class="form-control" >
            <?php
            $query = "SELECT client_id, client_name FROM clients";
            $response = @mysqli_query($dbc, $query);
            while($row = mysqli_fetch_array($response)){

                echo '<option value='. $row['client_id'].'>'. $row['client_id']." - ". $row['client_name'].'</option>';

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
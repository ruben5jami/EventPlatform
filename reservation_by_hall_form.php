<html>
<head>
    <title>Add dish</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../form.css">
</head>
<body>
<div class="container">
    <h2>Reservation By Hall</h2>
    <form action="reservation_by_hall.php" method="post">
        <?php
        // Get a connection for the database
        require_once('mysqli_connect.php'); ?>

        <p  class="form-group">From:
            <select name="hall_id" class="form-control" >
                <?php
                $query = "SELECT hall_id, hall_name FROM halls";
                $response = @mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($response)){

                    echo '<option value='.$row['hall_id'].'>'. $row['hall_id'].' - '.$row['hall_name'].'</option>';

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
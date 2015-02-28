<html>
<head>
    <title>Change invited</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../form.css">
</head>
<body>
<div class="container">
    <h2>Change Number Of Invites</h2>
    <form action="change_number_of_invite.php" method="post">
        <?php
        // Get a connection for the database
        require_once('mysqli_connect.php'); ?>
        <p  class="form-group">Reservation ID:
            <select name="reservation_id" class="form-control" >
                <?php
                $query = "SELECT reservation_id FROM reservations";
                $response = @mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($response)){

                    echo '<option value='.$row['reservation_id'].'>'. $row['reservation_id'].'</option>';

                }?>
            </select>
        </p>

        <p  class="form-group">New Number Of Invited:
            <input type="text" name="number_of_invite" size="30" value="" class="form-control" />
        </p>
        <p>
            <input type="submit" name="submit" value="Send" class="btn btn-default" />
        </p>


    </form>
</div>
</body>
</html>
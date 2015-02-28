<html>
<head>
    <title>Change Dish In Menu</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../form.css">
</head>
<body>
<div class="container">
    <h2>Change Dish In Menu</h2>
    <form action="change_dish_in_menu.php" method="post">
        <?php
        // Get a connection for the database
        require_once('mysqli_connect.php'); ?>
        <p  class="form-group">Menu ID:
            <select name="menu_id" class="form-control" >
                <?php
                $query = "SELECT menu_id FROM menus";
                $response = @mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($response)){

                    echo '<option value='.$row['menu_id'].'>'. $row['menu_id'].'</option>';

                }?>
            </select>
        </p>

        <p  class="form-group">Old Dish ID:
            <select name="old_dish_id" class="form-control" >
                <?php
                $query = "SELECT dish_id, dish_name FROM dishes";
                $response = @mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($response)){

                    echo '<option value='.$row['dish_id'].'>'. $row['dish_id'].' - '.$row['dish_name'].'</option>';

                }?>
            </select>
        </p>

        <p  class="form-group">New Dish ID:
            <select name="new_dish_id" class="form-control" >
                <?php
                $query = "SELECT dish_id, dish_name FROM dishes";
                $response = @mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($response)){

                    echo '<option value='.$row['dish_id'].'>'. $row['dish_id'].' - '.$row['dish_name'].'</option>';

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
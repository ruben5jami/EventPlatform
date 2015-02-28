<html>
<head>
    <title>Add dish</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../form.css">
</head>
<body>
<div class="container">
    <h2>Add a New Dish</h2>
<form action="dishadded.php" method="post">

    <p  class="form-group">Dish ID:
        <input type="number" name="dish_id" size="30" value="" class="form-control" />
    </p>

    <p  class="form-group">Dish Name:
        <input type="text" name="dish_name" size="30" value="" class="form-control" />
    </p>

    <p  class="form-group">Dish Description:
        <input type="text" name="dish_description" size="30" value="" class="form-control" />
    </p>

    <p  class="form-group">Dish Photo:
        <input type="text" name="dish_photo" size="30" value="" class="form-control" />
    </p>
    <p>
        <input type="submit" name="submit" value="Send" class="btn btn-default" />
    </p>

</form>
    </div>
</body>
</html>
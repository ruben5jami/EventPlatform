<html>
<head>
    <title>Add Event</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../form.css">
</head>
<body>
<div class="container">
<h2>Add a New Event</h2>
<form action="eventadded.php" method="post">

    <p class="form-group">Event ID:
        <input type="number" name="event_id" size="30" value=""  class="form-control"/>
    </p>

    <p class="form-group">Event Name:
        <input type="text" name="event_name" size="30" value=""  class="form-control"/>
    </p>

    <p class="form-group">
        <input type="submit" name="submit" value="Send" class="btn btn-default" />
    </p>

</form>
    </div>
</body>
</html>
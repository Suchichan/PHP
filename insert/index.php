<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Update</title>
</head>
<body>
<div class = "container">

<h2>Welcome to Bill Updater</h2><br>

<form action="insert.php" method="post">
<input type = "text" name="name" id="name" placeholder ="Company Name" required>
<input type = "number" min="1" name="billno" id="billno" placeholder ="Bill Number" required>
<input type = "date" name="date" id="date" placeholder ="Date" required> 
<button type="submit">Submit</button>
<button type="reset">Reset</button>
</form>

</body>
</html>
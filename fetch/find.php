<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "find.php" method ="post">
        <input type="text" name ="search" id="search" placeholder="Search" >
        <button type="submit">Search</button>
        <button onclick="history.back();">Back</button>
    </form>
</body>
</html>

<?php
include 'connect.php';
global $con;
if(isset( $_POST['search'])){
    $search = $_POST['search'];
    mysqli_select_db($con,$dbname);
$sql = "SELECT * from `detail` WHERE name= '$search'";
$result = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($result)) {
    $serial = $row['serial'];
    $name = $row['name'];
    $billno = $row['billno'];
    $amount = $row['amount'];
    $item = $row['items'];
    $payment = $row['payment'];
    $date = $row['date'];
    
    echo "Serial Number : ".($serial);
    echo "<br>"."Name : ".($name);
    echo "<br>"."Bill Number : ".($billno);
    echo "<br>"."Amount :".($amount);
    echo "<br>"."Payment".($payment);
    echo "<br>"."Date :".($date);
}

}
?>


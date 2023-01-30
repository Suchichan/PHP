<?php 
$insert = false;
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";
$dbname = "bill updater";

$con = mysqli_connect($server,$username,$password,$dbname);

if (!$con){
    die("connection to this database failed"
    .mysqli_connect_error());

}

$name = $_POST['name'];
$bill = $_POST['billno'];
$item =$_POST['items'];
$amount = $_POST['amount'];
$payment = $_POST['payment'];

    var_dump ($_POST)."<br>";

$sql = "INSERT INTO `bill updater`.`detail` (`name`, `billno`,`items`,`amount`,`payment`, `date`) VALUES ('$name','$bill','$items','$amount','$payment',current_timestamp());";

if($con->query($sql)==true){
    
    echo "Successfully inserted";
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button onclick="history.back();">Back</button>
</body>
</html>


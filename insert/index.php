<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Insert</title>
</head>
<body>
<div class = "container">

<h2>Welcome to Bill Updater</h2><br>

<form action="index.php" method="post" enctype="multipart/form-data">
<input type = "text" name="name" id="name" placeholder ="Company Name" required>
<input type = "number" min="1" name="billno" id="billno" placeholder ="Bill Number" required>
<input type="text" name = "items" id="items" placeholder="Items" required>
<input type="number" step="0.01" name ="amount" id="amount" placeholder="Amount" required>
<input type="text" name="payment" id="payment" placeholder="Payment Method" required>
<input type = "date" name="date" id="date" required> 
<input  type="file" name="file"><br><br>
<button type="submit">Submit</button>
<button type="reset">Reset</button>
</form>

<?php
if (isset($_POST['name'],$_POST['items'])){
$name = $_POST['name'];
$bill = $_POST['billno'];
$items =$_POST['items'];
$amount = $_POST['amount'];
$payment = $_POST['payment'];
$pdf = $_FILES['file']['name'];
}

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
    
    echo 'Company Name :'.' '.($_POST["name"])."<br>";
    echo 'Bill Number :'.' '.($_POST["billno"])."<br>";
    echo 'Items :'.' '.($_POST["items"])."<br>";
    echo 'Amount :'.' '.($_POST["amount"])."<br>";
    echo 'Payment :'.' '.($_POST["payment"])."<br>";
    print_r($_FILES["file"]["name"]);
    echo "<br>".'Date : '.' '.($_POST["date"])."<br>";


$sql = "INSERT INTO `bill updater`.`detail` (`name`, `billno`,`items`,`amount`,`payment`,`pdf`, `date`) VALUES ('$name','$bill','$items','$amount','$payment','$pdf',current_timestamp());";

if($con->query($sql)==true){
    
    echo "Successfully inserted the bill.<br>Please wait for the payment";
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

$con->close();
}
?>
</body>
<html>

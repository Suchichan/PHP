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

<form action="index.php" method="post">
<input type = "text" name="name" id="name" placeholder ="Company Name" required>
<input type = "number" min="1" name="billno" id="billno" placeholder ="Bill Number" required>
<input type="text" name = "items" id="items" placeholder="Items" required>
<input type="number" step="0.01" name ="amount" id="amount" placeholder="Amount" required>
<input type="text" name="payment" id="payment" placeholder="Payment Method" required>
<input type = "date" name="date" id="date" required> 
<button type="submit">Submit</button>
<button type="reset">Reset</button>
</form>

</body>
</html>

<?php
if (isset($_POST['name'],$_POST['items'])){
$name = $_POST['name'];
$bill = $_POST['billno'];
$items =$_POST['items'];
$amount = $_POST['amount'];
$payment = $_POST['payment'];
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
    echo 'Date :'.' '.($_POST["date"])."<br>";


$sql = "INSERT INTO `bill updater`.`detail` (`name`, `billno`,`items`,`amount`,`payment`, `date`) VALUES ('$name','$bill','$items','$amount','$payment',current_timestamp());";

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    
<?php
include "connect.php";
echo "Please Update";
if(isset($_POST['updater'])){
    $serial = $_POST['serial'];
    
    $up = ("SELECT * FROM detail WHERE serial ='$serial'");
    $result = mysqli_query($con,$up);

    if($result==True){
        while($row=mysqli_fetch_array($result)){
            ?>

            <form action="index.php" method="post">
            <input type="hidden" name="serial" value="<?php echo $row["serial"]?>">
            <input type = "text" name="name" id="name" placeholder ="Company Name" required value="<?php echo $row["name"]?>">
            <input type = "number" min="1" name="billno" id="billno" placeholder ="Bill Number" required value="<?php echo $row["billno"]?>">
            <input type="text" name = "items" id="items" placeholder="Items" required value="<?php echo $row["items"]?>">
            <input type="number" step="0.01" name ="amount" id="amount" placeholder="Amount" required value="<?php echo $row["amount"]?>">
            <input type="text" name="payment" id="payment" placeholder="Payment Method" required value="<?php echo $row["payment"]?>">
            <input type = "date" name="date" id="date" required value="<?php echo $row["date"]?>">
            <button type="submit" name="updated">Update</button>
            <a href="index.php" >Cancel</a>
            </form>

            <?php
                
                if(isset($name=$_POST['name'])){
                $name = $_POST['name'];
                $billno = $_POST['billno'];
                $items = $_POST['items'];
                $amount = $_POST['amount'];
                $payment = $_POST['payment']; 

                $serial = $_POST['serial'];

                $query = "UPDATE detail SET name = '$name' , billno = '$billno', items ='$items', amount = '$amount', payment = '$payment' WHERE serial ='$serial' ";
                
                $re = mysqli_query($con,$query);
                if($re){
                    echo "EUREKA";
                }
                else {
                    echo "Nope, Its Not Updated!!";
                
}}}
            ?>

            <?php 
        }
    }
    else {
        echo "Not Updated";
    }

?>

</body>
</html>
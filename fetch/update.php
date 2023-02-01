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
if(isset($_POST['updater'])){
    $serial = $_POST['serial'];
    
    $up = ("SELECT * FROM detail WHERE serial ='$serial'");
    $result = mysqli_query($con,$up);

    if($result){
        echo "Please Update";
        while($row=mysqli_fetch_array($result)){
            ?>
            
            <form action="updatefile.php" method="post">
            <input type="hidden" name="serial" placeholder="serial" value="<?php echo $row["serial"]?>">
            <input type = "text" name="name" id="name" placeholder ="Company Name" required value="<?php echo $row["name"]?>">
            <input type = "number" min="1" name="billno" id="billno" placeholder ="Bill Number" required value="<?php echo $row["billno"]?>">
            <input type="text" name = "items" id="items" placeholder="Items" required value="<?php echo $row["items"]?>">
            <input type="number" step="0.01" name ="amount" id="amount" placeholder="Amount" required value="<?php echo $row["amount"]?>">
            <input type="text" name="payment" id="payment" placeholder="Payment Method" required value="<?php echo $row["payment"]?>">
            <input type = "date" name="date" id="date" required value="<?php echo $row["date"]?>">
            <button type="submit" name="updated">Update</button>
            <a href="index.php">Cancel</a>
            </form>

        

            <?php 
        }}}
    
    else {
        echo "Check Update Part";  }

?>

</body>
</html>
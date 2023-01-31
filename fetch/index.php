<?php 
#connection check
$con = mysqli_connect("localhost","root","","bill updater") or die("Connection Failed");
$sql = "SELECT * FROM detail";
$result = mysqli_query($con,$sql) or die("Query Failed");

$row= mysqli_fetch_assoc($result);

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
    <form action = "index.php" method ="post">
        <input type="text" name ="search" id="search" placeholder="Search" >
        <button type="submit">Search</button>
    </form>

    <table>
        <tr>
            <th>ID Number</th>
            <th>Company Name</th>
            <th>Bill Number</th>
            <th>Item</th>
            <th>Amount</th>
            <th>Payment</th>
            <th>Date</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    <?php 
        while($row=$result->fetch_assoc())
        {
    ?>
        <tr>
            <td><?php echo $row['serial'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['billno'];?></td>
            <td><?php echo $row['items'];?></td>
            <td><?php echo $row['amount'];?></td>
            <td><?php echo $row['payment'];?></td>
            <td><?php echo $row['date'];?></td>

            <form action="update.php" method="post">
                <input type="hidden" name="serial" value="<?php echo $row['serial']?>">
                <th><input type="submit" value="Update" name="updater">
                </th></form>

            <form action="delete.php" method="post">
                <input type="hidden" name="serial" value="<?php echo $row['serial']?>">
                <th><input type="submit" value ="Delete" name="delete"></button>
                </th></form>
        </tr>   
        <?php
        }
        ?>    
    </table>
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
    echo "<br>"."Amount : ".($amount);
    echo "<br>"."Payment : ".($payment);
    echo "<br>"."Date : ".($date)."<br>"."<br>";
}

}
?>
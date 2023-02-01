<?php
#search
include 'connect.php';
global $con;
if(isset( $_POST['search'])){
    $search = $_POST['search'];
    mysqli_select_db($con,$dbname);

$sql = "SELECT * from detail WHERE name= '$search' or billno='$search'  or items='$search' or amount='$search' or payment='$search' ";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill View</title>
</head>
<body>
    <form action = "search.php" method ="post">
        <input type="text" name ="search" id="search" placeholder="Search" required>
        <button type="submit">Search</button>
        </form>
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



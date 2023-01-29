<?php 
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
    <title>Bill Updater</title>
</head>
<body>
    <table>
        <tr>
            <th>ID Number</th>
            <th>Company Name</th>
            <th>Bill Number</th>
            <th>Date</th>
        </tr>
    <?php 
        while($row=$result->fetch_assoc())
        {
    ?>
        <tr>
            <td><?php echo $row['serial'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['billno'];?></td>
            <td><?php echo $row['date'];?></td>
        </tr>
        <?php
        }
        ?>    
    </table>
</body>
</html>
<?php
include 'connect.php';
if(isset( $_POST['search'])){
    $search = $_POST['search'];
    mysqli_select_db($con,$dbname);


$sql = "SELECT * from detail WHERE name= '$search'";
$result = mysqli_query($con,$sql);
var_dump ($result);

$row = mysqli_fetch_array($result);

}
?>
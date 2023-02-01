<?php
include "connect.php";

if(isset($_POST['updated'])){
                $name = $_POST['name'];
                $billno = $_POST['billno'];
                $items = $_POST['items'];
                $amount = $_POST['amount'];
                $payment = $_POST['payment']; 

                $serial = $_POST['serial'];

                $query = "UPDATE detail SET name = '$name' , billno = '$billno', items ='$items', amount = '$amount', payment = '$payment' WHERE serial ='$serial' ";
                
                $re = mysqli_query($con,$query);
                if($re){
                    echo "The data is updated";
                    header ("location:index.php");
                }
                else {
                    echo "Nope, Its Not Updated!!".mysqli_error($con);  
                }}
?>
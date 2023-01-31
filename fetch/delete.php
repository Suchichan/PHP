<?php
    include "connect.php";
    
    if(isset($_POST['delete'])){
        $serial = $_POST['serial'];
        $del = ("DELETE FROM detail WHERE serial ='$serial'");
        $result = mysqli_query($con,$del);

        if($result==True){
            echo "Deleted";
            header ("location:index.php");
        }
        else {
            echo "Not deleted";
        }
}

?>

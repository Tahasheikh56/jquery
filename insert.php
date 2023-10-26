<?php
include("config.php");
extract($_POST);
$query = "INSERT INTO student VALUES('','$name','$email','$pswd','')";
if($obj->query($query) === TRUE){
    echo "<div class='alert alert-success'>Data inserted</div>";
}
else{
    echo "<div class='alert alert-danger'>Data not inserted</div>";
}


?>
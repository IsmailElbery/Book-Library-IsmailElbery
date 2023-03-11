<?php

    $con = new mysqli('localhost','root','','book_library');

    if(!$con){
        die(mysqli_error($con));
    }
?>
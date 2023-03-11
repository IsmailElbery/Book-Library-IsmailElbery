<?php

include 'connect.php';
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $rate = $_POST['rate'];
    $sql = "INSERT INTO book_rate (title,content,rate,book_id)" .
            "VALUES ('$title','$content','$rate','$id')";
    $result = mysqli_query($con,$sql);
    if($result){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
        die(mysqli_error($con));
    }
}
?>

<?php 
    
    include 'connect.php';
   
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from book_rate where id=$id";
        $result = mysqli_query($con,$sql);
        if($result){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{  
            die(mysqli_error($con));
        }
    }
?>

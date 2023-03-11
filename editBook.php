<?php

include 'connect.php';
if(isset($_POST['update']) && isset($_FILES['bookImg'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $publication_date = $_POST['publication_date'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $img_name = $_FILES['bookImg']['name'];
    $img_size = $_FILES['bookImg']['size'];
    $tmp_name = $_FILES['bookImg']['tmp_name'];
    $error = $_FILES['bookImg']['error'];
    if ($error === 0) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc =   strtolower($img_ex);
        $allowed_ex = array('jpg','png','jpeg');
        if(in_array($img_ex_lc,$allowed_ex)){
            $new_img_name = uniqid('IMG-',true) . '.' . $img_ex_lc;
            $img_upload_path = 'uploads/' . $new_img_name;
            move_uploaded_file($tmp_name,$img_upload_path);
            $sql = "update  books set id=$id,title='$title',publication_date='$publication_date',
            author='$author',description='$description',bookImg='$new_img_name' where id=$id";
            $result = mysqli_query($con,$sql);
            if($result){
                header('location:display.php');
            }else{
                die(mysqli_error($con));
            }
        }else{
            echo "
            <div class='alert alert-danger alert-dismissible fade show'>
           <strong>You can't upload files of this type </strong>
            
        </div>";
        }
    }else{
        $sql = "update  books set id=$id,title='$title',publication_date='$publication_date',
            author='$author',description='$description' where id=$id";
            $result = mysqli_query($con,$sql);
            if($result){
                header('location:display.php');
            }else{
                die(mysqli_error($con));
            }
    }
   
}
?>

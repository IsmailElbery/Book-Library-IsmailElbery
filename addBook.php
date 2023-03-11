<?php 
    
    include 'connect.php';
   
    if(isset($_POST['submit']) && isset($_FILES['bookImg'])){
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
                $sql = "INSERT INTO books (title,publication_date,author,description,bookImg)" .
                "VALUES ('$title','$publication_date','$author','$description','$new_img_name')";
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
        }
       
    }
?>

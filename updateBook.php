 <?php



?> 
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookLibrary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
       <?php 
       include 'connect.php';
       $id = $_GET['id'];
       $sql = "SELECT * FROM books where id=$id";
       $result = mysqli_query($con, $sql);
       if ($result) {
           while ($row = mysqli_fetch_assoc($result)) {
               $id = $row['id'];
               $title = $row['title'];
               $publication_date = $row['publication_date'];
               $author = $row['author'];
               $description = $row['description'];
               $bookImg = $row['bookImg'];
           }
       }
        echo '<form method="post" action="editBook.php" enctype="multipart/form-data">
            <div class="form-group">
                <label >Title</label>
                <input type="text" class="form-control" name="title" value="'.$title.'"  autocomplete="off">
                <input type="text" class="form-control" name="id" value="'.$id.'" hidden>
            </div>
            <div class="form-group">
                <label >Publicatio Date</label>
                <input type="date" class="form-control" name="publication_date" value="'.$publication_date.'"   autocomplete="off">
            </div>
            <div class="form-group">
                <label >Author</label>
                <input type="text" class="form-control" name="author" value="'.$author.'"   autocomplete="off">
            </div>
            <div class="form-group">
                <label >Description</label>
                <input type="text" class="form-control" name="description" value="'.$description.'"   autocomplete="off">
            </div>
            <div class="form-group">
                <label >Book Cover</label>
                <input type="file" class="form-control" name="bookImg" autocomplete="off">
                <div class="ads-thumbnail" >
                    <img style="height:100px ; width: 100px;  border-radius: 8px;" src="uploads/'. $bookImg .'" class="attachment-full size-full wp-post-image img-fluid" >
                </div>
            </div>
            <button type="submit" name="update" class="btn btn-primary my-5" >Update</button>
        </form>';
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
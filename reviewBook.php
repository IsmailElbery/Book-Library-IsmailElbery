<?php  
include 'connect.php';
$id = $_GET['id'];
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
 
        <form method="post" action="submitReview.php" enctype="multipart/form-data">
            <?php 
                echo' <input class="form-control" name="id" value="'.$id.'" hidden>';
             ?>
            <div class="form-group">
                <label >Title</label>
                <input type="text" class="form-control" name="title"  autocomplete="off">
            </div>
            <div class="form-group">
                <label >content</label>
                <input type="text" class="form-control" name="content"   autocomplete="off">
            </div>
            <div class="form-group">
                <label >Rate Book</label>
                <input type="number" class="form-control" name="rate"  autocomplete="off">
            </div>
            <button type="submit" name="submit" class="btn btn-primary my-5" >Submit</button>
            <a class="btn btn-info" href="display.php">Books</a>
        </form>
        <table class="table">
        <thead class="thead-light">
          <tr style="text-align: center;">
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Rate</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $sql = "SELECT * FROM book_rate where book_id=$id";
              if($sql){
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $content = $row['content'];
                        $rate = $row['rate'];
                        echo '<tr  style="text-align: center;">
                            <td>'. $title .'</td>
                            <td>'. $content .'</td>
                            <td>'. $rate .'</td>
                            <td>
                                  <a class="btn btn-danger" href="deleteReview.php?id='.$id.'">Delete Review</a>
                                </td>
                        </tr>';
                    }
                } else {
                    die(mysqli_error($con));
                }
              }
          ?>
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
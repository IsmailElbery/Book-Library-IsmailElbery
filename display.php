<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">

</head>
<body>
    <div class="container">
      <a href="book.php" class="btn btn-primary my-5">
          Add book
      </a>   
      <table class="table" id="myTable">
        <thead class="thead-light">
          <tr style="text-align: center;">
            <th scope="col">Book Title</th>
            <th scope="col">Publication Date</th>
            <th scope="col">Author</th>
            <th scope="col">Description</th>
            <th scope="col">Book Cover</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $sql = "SELECT * FROM books";
              $result = mysqli_query($con, $sql);
              if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      $id = $row['id'];
                      $title = $row['title'];
                      $publication_date = $row['publication_date'];
                      $author = $row['author'];
                      $description = $row['description'];
                      $bookImg = $row['bookImg'];
                      echo '<tr  style="text-align: center;">
                                <td>'. $title .'</td>
                                <td>'. $publication_date .'</td>
                                <td>'. $author .'</td>
                                <td>'. $description .'</td>
                                <td><div class="ads-thumbnail" >
                                <img style="height:100px ; width: 100px;  border-radius: 8px;" src="uploads/'. $bookImg .'" class="attachment-full size-full wp-post-image img-fluid" >
                            </div></td>
                                <td>
                                  <a class="btn btn-secondary" href="updateBook.php?id='.$id.'">Update</a>
                                  <a class="btn btn-danger" href="deleteBook.php?id='.$id.'">Delete</a>
                                  <a class="btn btn-info" href="reviewBook.php?id='.$id.'">Review</a>
                                </td>
                              </tr>';
                  }
              } else {
                  die(mysqli_error($con));
              }
          ?>
        </tbody>
      </table>
    </div>
</body>

<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script>
  let table = new DataTable('#myTable');
    
</script>
</html>
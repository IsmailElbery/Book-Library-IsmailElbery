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
       
        <form method="post" action="addBook.php" enctype="multipart/form-data">
            <div class="form-group">
                <label >Title</label>
                <input type="text" class="form-control" name="title"  autocomplete="off">
            </div>
            <div class="form-group">
                <label >Publicatio Date</label>
                <input type="date" class="form-control" name="publication_date"  autocomplete="off">
            </div>
            <div class="form-group">
                <label >Author</label>
                <input type="text" class="form-control" name="author"   autocomplete="off">
            </div>
            <div class="form-group">
                <label >Description</label>
                <input type="text" class="form-control" name="description"  autocomplete="off">
            </div>
            <div class="form-group">
                <label >Book Cover</label>
                <input type="file" class="form-control" name="bookImg" autocomplete="off">
            </div>
            <button type="submit" name="submit" class="btn btn-primary my-5" >Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
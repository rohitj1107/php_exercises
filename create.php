<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
  <body>
    <?php include 'db.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $obj = new DB;
            $obj->insert();
            header("Location: http://192.168.64.2/php/");
            exit();
        }
    ?>
    <div class="container">
      <br>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
          <label for="" class="mt-3">Title</label>
          <input type="text" name="title" class="form-control" value="">
          <label for="" class="mt-3">Content</label>
          <textarea name="content" class="form-control" ></textarea>
          <input type="submit" class="btn btn-success mt-3" name="submit" value="Send">
      </form>
    </div>
  </body>
</html>

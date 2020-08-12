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
            $obj->update();
            header("Location: http://192.168.64.2/php/");
            exit();
        }
        $obj = new DB;

        $segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
        $value = $obj->select_single($segments[2]);
    ?>
    <div class="container">
      <br>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
          <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
          <label for="" class="mt-3">Title</label>
          <input type="text" name="title" class="form-control" value="<?php echo $value['title']; ?>">
          <label for="" class="mt-3">Content</label>
          <textarea name="content" class="form-control" ><?php echo $value['content']; ?></textarea>
          <input type="submit" class="btn btn-success mt-3" name="submit" value="Send">
      </form>
    </div>
  </body>
</html>

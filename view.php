<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
  <body>
    <?php include 'db.php';
            $obj = new DB;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $obj->delete();
              header("Location: http://192.168.64.2/php/");
              exit();
            }
    ?>
    <div class="container">
      <br>
      <div class="row">
        <div class="col-md-4">
          <a href="../" class="btn btn-info">Back To List</a>
        </div>
      </div>
      <table class="table mt-5">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Content</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
              $value = $obj->select_single($segments[2]);
          ?>
          <tr>
            <td><?php echo $value['id']; ?></td>
            <td><?php echo $value['title']; ?></td>
            <td><?php echo $value['content']; ?></td>
            <td><?php echo $value['created_at']; ?></td>
            <td>
              <div class="btn-group">
                <a href="../edit.php/<?php echo $value['id']; ?>" class="btn btn-warning">Edit</a>&nbsp
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                  <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                  <input type="submit" class="btn btn-danger" name="Delete" value="Delete">
                </form>
              </div>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </body>
</html>

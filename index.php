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
          <a href="create.php" class="btn btn-info">Create Title</a>
        </div>
      </div>
      <table class="table mt-5">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Created</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($obj->select()):
          foreach($obj->select() as $value): ?>
          <tr>
            <td><?php echo $value[0]; ?></td>
            <td><?php echo $value[1]; ?></td>
            <td><?php echo $value[3]; ?></td>
            <td>
              <div class="btn-group">
                  <a href="view.php/<?php echo $value[0]; ?>" class="btn btn-success">View</a>&nbsp
                  <a href="edit.php/<?php echo $value[0]; ?>" class="btn btn-warning">Edit</a>&nbsp
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $value[0]; ?>">
                    <input type="submit" class="btn btn-danger" name="Delete" value="Delete">
                  </form>
              </div>
            </td>
          </tr>
        <?php endforeach;
        else :
          echo 'Not Record in table';
        endif;
        ?>
        </tbody>
      </table>
    </div>
  </body>
</html>

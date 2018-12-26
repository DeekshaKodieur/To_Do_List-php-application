<!DOCTYPE html>

<?php include 'db.php';

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perpage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perpage) - $perpage : 0;

$sql= "select * from tasks order by `id` asc limit ".$start." , ".$perpage."";
$total = $db->query("select * from tasks")->num_rows;
$pages = ceil($total / $perpage);

$rows = $db->query($sql);

?>



<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <title>CRUD APP</title>
  </head>
  <body>

    <div class="container" style="background-color:#FAFAFA ;">
      <div class="row" style="margin-top:70px;">
        <center><h1 style = "font-family: Georgia,Times,Times New Roman,serif;">TO DO LIST</h1> </center>

          <div class="col-md-10 col-md-offset-1">


              <button type="button" data-target="#myModal" data-toggle="modal" name="button" class="btn btn-success">Add Task</button>
              <button type="button" name="button" class="btn btn-default pull-right" onclick="print()">Print</button>
              <hr><br>

              <!-- Modal -->
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Add Task</h4>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="add.php" >
                        <div class="form-group">
                          <label>Task Name</label>
                          <input type="text" required name="task" value="" class="form-control">
                        </div>
                          <input type="submit"  name="send" value="Add Task" class="btn btn-success">
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>
              <div class="jumbotron">
              <div class="col-md-12 text-center">
                <p><b>Search</b></p>
                <form class="form-group" action="search.php" method="post">
                    <input type="text" placeholder="search" name="search" class="form-control" value="">
                </form>

            </div>

              <table class="table table-hover" >
              <thead>
                <tr>
                  <th scope="col">ID.</th>
                  <th scope="col">Task</th>
                </tr>
              </thead>

              <tbody>
                <tr>

                  <?php while($row=$rows->fetch_assoc()) : ?>
                  <th><?php echo $row['id'] ?></th>
                  <td class="col-md-10"><?php echo $row['name'] ?></td>
                  <td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a></td>
                  <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>

                </tr>
                  <?php endwhile; ?>

              </tbody>
            </table>

            <center>

                <ul class="pagination">

                <?php for($i=1 ; $i<=$pages ; $i++): ?>
                <li><a href="?page=<?php echo $i;?>&per-page=<?php echo $perpage;?>"><?php echo $i;?></a></li>

              <?php endfor ;?>

                </ul>

            </center>

        </div>

      </div>

    </div>

  </div>


  </body>
</html>

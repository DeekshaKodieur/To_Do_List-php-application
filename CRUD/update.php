<!DOCTYPE html>

<?php include 'db.php';

$id = $_GET['id'];

$sql= "select * from tasks  where id = '$id' order by `id` asc";

$rows = $db->query($sql);

$row = $rows->fetch_assoc();

if(isset($_POST['send'])){

  $task=$_POST['task'];

  $sql2= "update tasks set name='$task' where id='$id'";

  $db->query($sql2);

  header('location:index.php');

}



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
        <center><h1 style = "font-family: Georgia,Times,Times New Roman,serif;" >Update To Do List</h1> </center>


          <div class="col-md-10 col-md-offset-1">


            <table class="table">

              <hr><br>
              <div class="jumbotron">
                      <form method="post">
                        <div class="form-group">
                          <label>Task Name</label>
                          <input type="text" required name="task" value="<?php echo $row['name'];?>" class="form-control">
                        </div>
                          <input type="submit"  name="send" value="Update Task" class="btn btn-success">&nbsp;
                          <a href="index.php" class="btn btn-warning"> Back </a>
                      </form>

              </table>
              </div>
              </div>
              </div>
            </div>


 </body>
</html>

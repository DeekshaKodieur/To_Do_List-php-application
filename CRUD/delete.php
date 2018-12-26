<?php
include 'db.php';

ini_set('display_errors',1);

$id = $_GET['id'];

$sql = "delete from tasks where id = '$id'";

$val = $db->query($sql);

if($val)
{
    header('location:index.php');


};

 ?>

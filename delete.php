<?php
require './includes/header.php';
require_once '../../../mysqli_connect.php';
$id=$_GET['id'];
echo $id;
//$q="DELETE FROM player WHERE player_id=";
$query='delete from players where player_id ='.$id;
mysqli_query($conn,$query);
header('location:index.php');

?>
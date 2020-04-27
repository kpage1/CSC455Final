<?php
require './includes/header.php';
require_once '../../../mysqli_connect.php';
$id=$_GET['id'];
echo $id;
//$q="DELETE FROM player WHERE player_id=";
$query='DELETE from players where player_id =.$id';
mysqli_query($dbc,$query);
header('location:add_01.php');

?>


 <?php
require './includes/header.php';
require_once '../../../mysqli_connect.php';
$result = mysqli_query($conn,"CREATE VIEW [Cust] AS SELECT player_id,player_name, FROM player
								WHERE player_id > 1");
$summary=mysqli_query($conn,"SELECT player_id,player_name,height,weight,salary from player )");
$query='delete from players where dno ='.$id;
?>
<?php include "./Homepage.html"; ?>
<!DOCTYPE html>
<html>
 <head>
 <title> data</title>
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <br>
  <table border=1 align="center" width="50%" height="50%">
  <tr><td colspan=6><a href="index.html">Add players></td>
  </tr>
  <tr>
    <td>Player Number</td>
    <td>Player Name</td>
    <td>height</td>
    <td>weight</td>
	<td>salary</td>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["player_id"]; ?></td>
    <td><?php echo $row["player_name"]; ?></td>
    <td><?php echo $row["height"]; ?></td>
    <td><?php echo $row["weight"]; ?></td>
	<td><?php echo $row["salary"]; ?></td>
	
</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
<?php
if (mysqli_num_rows($summary) > 0) {
?>
  <br>
    <table border=1 align="center" width="50%" height="50%">
	<caption>Data trigger for delete option </caption>
    <tr>
    <td>Player Number</td>
    <td>Player Name</td>
    <td>height</td>
    <td>weight</td>
	<td>salary</td>
	<td>delete</td>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($summary)) {
?>
<tr>
    <td><?php echo $row["player_id"]; ?></td>
    <td><?php echo $row["player_name"]; ?></td>
    <td><?php echo $row["height"]; ?></td>
    <td><?php echo $row["weight"]; ?></td>
	<td><?php echo $row["salary"]; ?></td>
	<td><button><a href="delete.php?id=<?php echo $row['dno']; ?>">Delete</a></button></td>
</tr>
<?php
$i++;
}
?>
</table>
<?php
}
else{
    echo "No result found";
}
?>
 </body>
</html>

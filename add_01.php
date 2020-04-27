 <?php
require './includes/header.php';
require_once '../../../mysqli_connect.php';
$result = mysqli_query($dbc,"CREATE VIEW player1 AS SELECT playerID, player_name FROM player WHERE playerID = '1'");
$summary=mysqli_query($dbc,"SELECT playerID,player_name,height,weight,salary from player");
$query='delete from player where dno =.$id';

if (mysqli_num_rows($result) > 0) {
?>
  <br>
  <table border=1 align="center" width="50%" height="50%">
  <tr><td colspan=6><a href="add_01.php">Add players></td>
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
    <td><?php echo $row["playerID"]; ?></td>
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
    echo "No result found 1";
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
while($row2 = mysqli_fetch_assoc($summary)) {
?>
<tr>
    <td><?php echo $row2["playerID"]; ?></td>
    <td><?php echo $row2["player_name"]; ?></td>
    <td><?php echo $row2["height"]; ?></td>
    <td><?php echo $row2["weight"]; ?></td>
	<td><?php echo $row["salary"]; ?></td>
	<td><button><a href="deleted.php?id=<?php echo $row['dno']; ?>">Delete</a></button></td>
</tr>
<?php
$i++;
}
?>
</table>
<?php
}
else{
    echo "No result found 2";
}
?>
 </body>
</html>

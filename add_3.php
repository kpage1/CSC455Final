<?php
require './includes/header.php';
require_once '../../../mysqli_connect.php';
$result = mysqli_query($dbc,"CREATE VIEW player1 AS SELECT playerID, player_name FROM player WHERE playerID = '1'");
$summary=mysqli_query($dbc,"SELECT * from matches");
$summary1=mysqli_query($dbc,"CREATE FUNCTION simple_operation (home_ID int) RETURNS int RETURN home_ID+1 ");
$summary2=mysqli_query($dbc,"CALL simple_operation");
$query='delete from player where dno =.$id';

 
?>
<?php
if (mysqli_num_rows($summary) > 0) {
?>
  <br>
    <table border=1 align="center" width="50%" height="50%">
	<caption> Game Stats </caption>
    <tr>
    <td>game_num</td>
    <td>home_ID</td>
    <td>away_ID</td>
   
  </tr>
<?php
$i=0;
while($row2 = mysqli_fetch_assoc($summary)) {
?>
<tr>
    <td><?php echo $row2["game_num"]; ?></td>
    <td><?php echo $row2["home_ID"]; ?></td>
    <td><?php echo $row2["away_ID"]; ?></td>
   
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

?>
<?php
if (mysqli_num_rows($summary1) > 0) {
?>
  <br>
    <table border=1 align="center" width="50%" height="50%">
	<caption>Updated Game Stats </caption>
    <tr>
    <td>game_num</td>
    <td>home_ID</td>
    <td>away_ID</td>
   
  </tr>
<?php
$i=0;
while($row2 = mysqli_fetch_assoc($summary1))

while($row2 = mysqli_fetch_assoc($summary2)) 	{
?>
<tr>
    <td><?php echo $row2["game_num"]; ?></td>
    <td><?php echo $row2["home_ID"]; ?></td>
    <td><?php echo $row2["away_ID"]; ?></td>
   
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
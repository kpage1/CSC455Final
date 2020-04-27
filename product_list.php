<?php 
	require './includes/header.php';
	require_once '../../../mysqli_connect.php';
	$sql = 'SELECT * FROM merch_type';
	$result = mysqli_query($dbc, $sql);
	if (!$result) {
		echo "We are unable to process your request at  this  time. Please try again later.";
			include 'includes/footer.php'; 
			exit;
	}else{
		$row = mysqli_fetch_assoc($result);
	}
	
	function shortTitle ($title){
		$title = substr($title, 0, -4); #remove the .ext from each title
		$title = str_replace('_', ' ', $title); #replace underscores with blanks
		$title = ucwords($title); #capitalize each word
		return $title;
	}
		
	?>
  <main>
	
	<h3>Here is a sample of our products</h3> 
	<h4>Please click the View Details button to make a purchase or <a href="cart_view.php"> Cart View </a></h4>

    <table>
        <tr>
            <th>Title</th>
			<th>Image</th>
			<th></th>
		</tr>
      
        <?php while($row = mysqli_fetch_assoc($result)) { 
        	$title = $row['filename'];
        	?> 

        	<tr>
			<td><?=shortTitle($title);?></td>
            <td><img src="images/<?=$row['filename'];?>" alt="<?=shortTitle($title);?>"></td>
			<td>
				<form method = "get" action="product_details.php">
					<input type="hidden" name="image_id" value="<?= $row['image_id'];?>">
					<input type="submit" name="submit" value="View Details">
				</form>
			 </td>
		</tr>
    <?php } //end while loop ?>
    </table>
  </main>
<?php include 'includes/footer.php'; ?>
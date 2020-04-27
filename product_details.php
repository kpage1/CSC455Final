<?php
	require './includes/header.php';
	require_once '../../../mysqli_connect.php';
	echo '<main>';
	
	function shortTitle ($title){
		$title = substr($title, 0, -4);
		$title = str_replace('_', ' ', $title);
		$title = ucwords($title);
		return $title;
	}
	if(isset($_GET['image_id'])) {
		$imgID = filter_var($_GET['image_id'], FILTER_VALIDATE_INT);
		$getDetails= "SELECT * FROM merch_type INNER JOIN merch_price ON merch_type.merch_ID = merch_price.merch_ID where image_id = ?";
		$stmt = mysqli_prepare($dbc, $getDetails);
		mysqli_stmt_bind_param($stmt, 'i', $imgID);
		mysqli_stmt_execute($stmt);
		$result=mysqli_stmt_get_result($stmt);
		$rows = mysqli_num_rows($result);
		if ($rows == 1) { // Valid print ID.
			// Fetch the information.
			$item = mysqli_fetch_assoc($result);
			// Retrieve the query results into scalar variables
			$file = $item['filename'];
			$title = shortTitle($file);
			$price = $item['price'];
			$merch_type = $item['merch_type'];
			
			
			?>
			<h2>Purchase <?= $title ?></h2>					
			<p><img src="images/<?=$file;?>"  alt="<?=$title?>"></p>
			<h3><strong>Description:</strong></h3>
			<h4><?= $merch_type ?></h4>
			
			<h4><strong>Price: </strong><?= $price ?>
			<!-- Insert Add to Cart button here -->
			<form style = "display: inline;" action="cart.php" method="post">
				<input type="hidden" name="action" value="add">
				<input type="hidden" name="image_id" value="<?php echo $imgID; ?>">
				<input type="hidden" name="qty" value=1>
				<input type="submit" value="Add to Cart">
			</form>
			<?php if(!empty($_SESSION['cart'])) {?>
				or <a href="cart_view.php"><button>View Cart</button></a>
			<?php } ?>
			</h4>						
		<?php }
		else {
			echo "<main><h2>We are unable to process your request at  this  time.</h2><h3>Please try again later.</h3></main>";
			include 'includes/footer.php';
			exit;
		}
	}else {
		echo "<main><h2>You have reached this page in error</h2><h3>Use the menu at the left to view our products.</h3></main>";
		include 'includes/footer.php'; 
		exit;
	   } 
echo '</main>';
include 'includes/footer.php'; ?>
<?php 
// session_start();
require 'includes/header.php';
?>
	<main>
	<?php if ( $_SESSION['fn'])  {
		$firstname = $_SESSION['fn'];
			
			$message = "Welcome back $firstname";
			$message2 = "You are now logged in";
		} else { 
			$message = 'You have reached this page in error';
			$message2 = 'Please use the menu at the right';	
		}
		// Print the message:
		echo '<h2>'.$message.'</h2>';
		echo '<h3>'.$message2.'</h3>';
		?>
	</main>
	<?php // Include the footer and quit the script:
	include ('./includes/footer.php'); 
	exit();
	?>
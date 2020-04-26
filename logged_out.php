<?php 
session_start();
?>
	
	<?php 
	if ( $_SESSION['fn'])  {
		$_SESSION = array();
		session_destroy();
		setcookie('PHPSESSID', '', time()-3600, '/');

			$message = "Good Bye $firstname";
			$message2 = "You are now logged out";
		} else { 
			$message = 'You have reached this page in error';
			$message2 = 'Please use the menu at the right';	
		}
		require ('includes/header.php');
		require_once('reg_conn.php');
		// Print the message:
		echo '<main><h2>'.$message.'</h2>';
		echo '<h3>'.$message2.'</h3>';
		?>
	</main>
	<?php // Include the footer and quit the script:
	include ('./includes/footer.php'); 
	exit();
	?>
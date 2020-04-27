	<?php 
	$currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?>
	<ul id="nav">
        <li><a href="index.php" <?php if ($currentPage == 'index.php') {echo 'id="here"'; } ?>>Home</a></li>
        <li><a href="players.php" <?php if ($currentPage == 'players.html') {echo 'id="here"'; } ?>>Players</a></li>
        <li><a href="teams.php" <?php if ($currentPage == 'teams.html') {echo 'id="here"'; } ?>>Teams</a></li>
		<li><a href="product_list.php" <?php if ($currentPage == 'product_list.php') {echo 'id="here"'; } ?>>Shopping</a></li>
        <li><a href="gameData.php" <?php if ($currentPage == 'gameData.html') {echo 'id="here"'; } ?>>Game Data</a></li>
		<li><a href="create_acct.php" <?php if ($currentPage == 'create_acct.php') {echo 'id="here"'; } ?>>Register</a></li> 
		<?php if ( $_SESSION['email'])  { ?>
			<li><a href="logged_out.php" <?php if ($currentPage == 'create_acct.php') {echo 'id="here"'; } ?>>Log Out</a></li> 
		<?php } else { ?>
		<li><a href="login.php" <?php if ($currentPage == 'login.php') {echo 'id="here"'; } ?>>Login</a></li> 
	<?php } ?>
    </ul>
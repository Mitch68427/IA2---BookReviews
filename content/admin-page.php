<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body class="bg-one">
	
		<?php require 'header-panel.php'; ?>
				
		<div class="row">
			<div class="col-12">
				<?php 
					if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 0){
						echo("<p>You do not have access to this page.</p>");
					}
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<?php 
					if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1){
						require 'admin-book-review-panel.php';
					}
				?>
			</div>
		</div>
				
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to - FORM</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="glide.core.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.2.0/css/glide.theme.min.css">
		<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
	</head>
	<body class="bg-one">
		<?php require 'header-panel.php'; ?>
		
		<?php require 'book-glider.php'; ?>
		
		<div class="message-panel-spliter mt-50"></div>
		
		<?php 
			if (!isset($_SESSION['userid'])){
				require 'login-signup-panel.php';
			}
		?>
			
		<script>
		  new Glide(document.querySelector('.glide'), {
				type: 'sliders',
				startAt: 1,
				perView: 4,
				focusAt: 'center',
				keyboard: true,
				gap: 10
			}).mount();
		</script>
	</body>
</html>
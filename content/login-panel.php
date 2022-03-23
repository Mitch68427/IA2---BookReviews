	<div class='bg-one row'>
		<div class='col-4'></div>
		<div class='col-4'>
			<div class='display-box banner-title col-12'>
				<h1>Log In</h1>
				<?php 
					if (isset($_GET['login']) && $_GET['login'] == "failed"){
						echo("<h4>Error, please try your email and password again!</h4>"); 
					}
				?>
			</div>
			<div class='col-12'>		
				<form action="login.php" method="post">
					<input class="basic-field" name="email" type="email" required placeholder="enter your email"/><br/><br/>
					<input class="basic-field" name="pword" type="password" required placeholder="enter your pasword" /><br/><br/>
					<input class="basic-submit" type="submit" value="Log In" />
				</form>
			</div>
		</div>
		<div class='col-3'></div>
	</div>
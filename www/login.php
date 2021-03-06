<?php
	session_start();
		#title
	$page_title = "Admin Login";

		#include header
include "includes/header.php";

include "includes/db.php";

include "includes/functions.php";

	if(array_key_exists("login", $_POST)){
		#error caching
		$errors = [];

		if(empty($_POST["email"])){
			$errors["email"] = "please enter your email";
		}

		if(empty($_POST["password"])){
			$errors["password"] = "please enter your password";
		}

		if(empty($errors)){
			#select from database

			#clean unwanted values in the $_POST array
			$clean = array_map("trim", $_POST);

			adminLogin($conn, $clean);
		}

	}

?>


<div class="wrapper">
		<h1 id="register-label">Admin Login</h1>
		<hr>
		<form id="register"  action ="login.php" method ="POST">
			<div>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>

			<input type="submit" name="login" value="login">
		</form>

		<h4 class="jumpto">Don't have an account? <a href="register.php">register</a></h4>
	</div>

	<?php
		#include footer
include "includes/footer.php";


?>
<?php
	function doAdminRegister($pdo, $input) {
		#hast the password
		$hash = password_hash($input["password"], PASSWORD_BCRYPT);

		#insert data
		$stmt = $pdo->prepare("INSERT INTO admin(firstname, lastname, email, hash) VALUES(:fn, :ln, :e, :h)");

		#bind params
		$data = [
			":fn" => $input["fname"],
			":ln" => $input["lname"],
			":e" => $input["email"],
			":h" => $hash
		];

		$stmt->execute($data);
	}

	function displayErrors($open, $name){
		$result = "";

		if(isset($open[$name])){
			$result = "<span class='err'>".$open[$name]."</span>";
		}
		return $result;
	}

	function doesEmailExist($pdo, $email){
		$result = false;
		$stmt = $pdo->prepare("SELECT email FROM admin WHERE email=:e");

		#bind params
		$stmt->bindParam(":e", $email);
		$stmt->execute();

		#get number of rows returned
		$count = $stmt->rowCount();

		if($count > 0){
			$result = true;
		}
	return $result;
	}

function adminLogin($pdo, $enter){
	$stmt = $pdo->prepare("SELECT * FROM admin WHERE email=:e");

	#bind params
	$stmt->bindParam(":e", $enter["email"]);
	$stmt->execute();

	$count = $stmt->rowCount();

	if($count==1){
		$row = $stmt->fetch(PDO::FETCH_ASS0C);

		if(password_verify($enter["password"], $row["hash"])){

			$_SESSION["id"] = $row["admin"];
			$_SESSION["email"] = &row["email"];

			header("Location:home.php");
		}
		else{

			$login_error = "wrong email or password";
			header("Location:login.php?login_error=$login_error");
		}
	}

}



?>
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





?>
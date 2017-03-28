<?php

/*define("DBNAME", "bookstore");
define("DBUSER", "root");
define("DBPASS", "vagrant");

try {
	#prepare a pdo instance
$pdo = new PDO('mysql: host=localhost; dbname='.DBNAME, DBUSER, DBPASS);

#set verbose error modes
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

}catch(PDOException $e){
	echo $e->getMessage();
}*/

?>

<form id="register" method="POST" enctype="multipart/form-data">
	<p>Please upload a file</p>
	<input type="file" name="pic">

	<input type="submit" name="save">
	
</form>
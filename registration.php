<?php

	//laeme funktsiooni failis
	require_once("function.php");
	
	//kontrollin, kas kasutaja on sisseloginud
	if(isset($_SESSION["user_id_from_db"])){
		// suunan data lehele
		header("Location: data.php");
	}
	
	$create_password_error = "";
	$create_email_error = "";
	$create_name_error = "";
	$create_secondname_error = "";
	$create_login_error = "";
	$create_mobile_error = "";

	$create_email = "";
	$create_password = "";
	$create_name = "";
	$create_secondname = "";
	$create_login = "";
	$create_mobile = "";
	
	if(isset($_POST["create"])){
		
			if ( empty($_POST["create_email"]) ) {
				$create_email_error = "See v�li on kohustuslik";
			}else{
				$create_email = cleanInput($_POST["create_email"]);
			}
			
			if ( empty($_POST["create_password"]) ) {
				$create_password_error = "See v�li on kohustuslik";
			} else {
				if(strlen($_POST["create_password"]) < 8) {
					$create_password_error = "Peab olema v�hemalt 8 t�hem�rki pikk!";
				}else{
					$create_password = cleanInput($_POST["create_password"]);
				}
			}
			
			if ( empty($_POST["create_login"]) ) {
				$create_login_error = "See v�li on kohustuslik";
			}else{
				$create_login = cleanInput($_POST["create_login"]);
			}
			
			if ( empty($_POST["create_name"]) ) {
				$create_name_error = "See v�li on kohustuslik";
			}else{
				$create_name = cleanInput($_POST["create_name"]);
			}
			
			if ( empty($_POST["create_secondname"]) ) {
				$create_secondname_error = "See v�li on kohustuslik";
			}else{
				$create_secondname = cleanInput($_POST["create_secondname"]);
			}
			
			
			if ( empty($_POST["create_mobile"]) ) {
				$create_mobile_error = "See v�li on kohustuslik";
			}else{
				$create_mobile = cleanInput($_POST["create_mobile"]);
			}
   
			if(	$create_email_error == "" && $create_password_error == ""){
				echo "N��d oled registreeritud! <br> Kasutajanimi: ".$create_email." <br> Parool: ".$create_password;
				
				$password_hash = hash("sha512", $create_password);
				echo "<br>";
				echo $password_hash;
				
		
		    createUser($create_login, $create_email, $password_hash, $create_name, $create_secondname, $create_mobile);
			
			}
  
 
}

		function cleanInput($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
  }

?>

 <html>
 <body>
		<h2>Create user</h2>

		<div>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="field" >
			<label>Login:</label> <input class="input" name="create_login" type="login" placeholder="Login" value="<?php echo $create_login; ?>"> <?php echo $create_login_error; ?><br><br>
			<label>E-mail:</label> <input class="input" name="create_email" type="email" placeholder="E-post" value="<?php echo $create_email; ?>"> <?php echo $create_email_error; ?><br><br>
			<label>Parool:</label> <input class="input" name="create_password" type="password" placeholder="Parool"> <?php echo $create_password_error; ?> <br><br>
			<label>Nimi:</label> <input class="input" name="create_name" type="text" placeholder="Nimi" value="<?php echo $create_name; ?>"> <?php echo $create_name_error; ?><br><br>
			<label>Perekonnanimi:</label> <input class="input" name="create_secondname" type="text" placeholder="Perekonnanimi" value="<?php echo $create_secondname; ?>"> <?php echo $create_secondname_error; ?><br><br>
			<label>Tel.number:</label><input class="input" name="create_mobile" type="text" placeholder="tel.number" value="<?php echo $create_mobile; ?>"> <?php echo $create_mobile_error; ?><br><br>
			</div>
			<input  name="create" type="submit" class="button3" value="create user" > <br><br>
        </form>

			

<?php 
	$file_name = "registration.php";
	$page_title = "Registration"; ?>
	

	
<?php require_once("foother.php"); ?>

<?php require_once("menyy.php"); ?>



<?php
	$pass = "";
	$pass_komfrim = "";
	$passErr = "";
	$valid_pass = true;
	$valid_pass_msg = "";
	
	if(isset($_POST['submit'])){
		$pass = trim($_POST['pass']);
		
		if(empty($pass)){
			$passErr = "Password masih kosong.<br>";
		}
		if(strlen($pass) < 8){
			$valid_pass = false;
			$valid_pass_msg = "Password minimal 8 digit.<br>";
		}
		if(!preg_match("#[0-9]+#",$pass)){
			$valid_pass = false;
			$valid_pass_msg = "Password harus menggunakan setidaknya 1 angka.<br>";
		}
		if(!preg_match("#[a-z]+#",$pass)){
			$valid_pass = false;
			$valid_pass_msg = "Password harus menggunakan setidaknya 1 huruf kecil.<br>";
		}
		if(preg_match("#[A-Z]+#",$pass)){
			$valid_pass = false;
			$valid_pass_msg = "Password tidak boleh menggunakan huruf kapital.<br>";
		}
		if(preg_match("/[^\da-zA-Z]/",$pass)){
			$valid_pass = false;
			$valid_pass_msg = "Password tidak boleh menggunakan huruf spesial.<br>";
		}
				
		// Cek semua input sudah diisi apa belum
		if( !empty($pass)and $valid_pass){
			// Disini tempat menulis kode (semua syarat sudah input terpenuhi).
			// Misalnya menulis kode query ke database
			echo "Selamat password anda valid.<br>";
		}
		
	}
?>

<h3>Valid Password</h3>

<form action="nomer2.php" method="post">
	Password : <input type="password" name="pass" value="<?php echo $pass; ?>">
		<?php echo $passErr.$valid_pass_msg; ?>
	<input type="submit" name="submit" value="Register">
</form>
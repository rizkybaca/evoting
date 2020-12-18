<?php 

include "./inc/koneksi.php";

if (isset($_POST['btnLogin'])) {
	// anti inject sql
	$username=mysqli_real_escape_string($koneksi,$_POST['username']);
	$password=mysqli_real_escape_string($koneksi,$_POST['password']);

	//query login
	$sql_login = "SELECT * FROM tb_pengguna WHERE username='$username' AND password='$password'";
	$query_login = mysqli_query($koneksi, $sql_login);
	$data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
	$jumlah_login = mysqli_num_rows($query_login);

	// set session
	if ($jumlah_login ==1 ){
		session_start();
		$_SESSION["ses_id"]=$data_login["id_pengguna"];
		$_SESSION["ses_nama"]=$data_login["nama_pengguna"];
		$_SESSION["ses_username"]=$data_login["username"];
		$_SESSION["ses_password"]=$data_login["password"];
		$_SESSION["ses_level"]=$data_login["level"];
		$_SESSION["ses_status"]=$data_login["status"];
		$_SESSION["ses_jenis"]=$data_login["jenis"];

	// cek dashboard admin atau user
	if ($_SESSION["ses_level"]=="Pemilih") {
		echo "
			<script>
				alert('berhasil login!');
				document.location.href = 'index1.php';
			</script>
		";
	} elseif ($_SESSION["ses_level"]=="Administrator" || $_SESSION["ses_level"]=="Panitia"){
		echo "
			<script>
				alert('berhasil login!');
				document.location.href = 'index.php';
			</script>
		";
		} else{
			echo "
				<script>
					alert('gagal login!');
					document.location.href = 'login.php';
				</script>
			";
		}
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>ngevote | login</title>
</head>
<body>
	<h3>Silakan masuk dengan akun anda</h3>
	<form action="" method="POST">
		<ul>
			<li>
				<label for="username">Username</label>
			</li>
			<li>
				<input type="text" name="username" id="username" required>
			</li>
			<li>
				<label for="password">Password</label>
			</li>
			<li>
				<input type="password" name="password" id="password" required>
			</li>
			<li>
				<button type="submit" name="btnLogin">Masuk</button>
			</li>					
		</ul>		
	</form>
</body>
</html>
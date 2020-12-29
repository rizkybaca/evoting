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
	}
	} else{
			echo "
				<script>
					alert('gagal login!');
					document.location.href = 'login.php';
				</script>
			";
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./dist/css/style1.css">
   <link rel="icon" href="./dist/img/voting.svg">
   <title>Login</title>
</head>
<body>
   <main id="login">
      <section>
				<h1>
					<span style="font-weight: 250">
						Selamat Datang di
					</span><br>
						Nge-Vote
				</h1>
				
        <form action="" method="POST">
          <div class="username">
						<div>username</div>
						<input type="text" name="username" placeholder="nama akun" required>
          </div>
          <div class="password">
            <div for="">password</div>
            <input type="password" name="password" placeholder="kata sandi" required>
          </div>
          <input type="submit" name="btnLogin" value="Login">
        </form>
      </section>
   </main>

   <footer id="login">
      <div>Nge-Vote  |  2020  |  all right reserved</div>
   </footer>
</body>
</html>
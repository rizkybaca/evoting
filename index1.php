<?php 

// mulai session
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
	$data_status = $_SESSION["ses_status"];
	$data_jenis = $_SESSION["ses_jenis"];
}

// koneksi db
include "./inc/koneksi.php";

if(isset($_GET["page"])){
	$_SESSION["ses_dump"] = $_GET['page'];
} else{
	$_SESSION["ses_dump"] = "";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>nge-Vote</title>
	<link rel="stylesheet" type="text/css" href="./dist/css/style1.css">
	<script type="text/javascript" src="./dist/js/Chart.js"></script>
</head>
<body>
	<nav>
		<div class="brand">
			Ngevote
		</div>
		<div class="right">
			<div class="menu">
				<a href="index1.php">Home</a>
				<a href="?page=data-suara">Quick Count</a>
			</div>
			<div class="log">
			<a onclick="return confirm('Apakah Anda yakin akan keluar?')" href="logout.php">Halo, <?= $data_nama; ?></a>
			</div>
		</div>
	</nav>
	<main>
	<?php 
	if (isset($_GET['page'])) {
		$hal=$_GET['page'];

		switch ($hal){
			// klik homepage
			case 'pemilih':
				include "home/pemilih.php";
				break;

			// bilik suara
			case 'PsSQAdT':
				include "pemilih/calon/data_calon.php";
				break;
			case 'PsSQBpL':
				include "pemilih/calon/pilih_calon.php";
				break;
			case 'PsSQBBK':
				include "pemilih/calon/buka_calon.php";
				break;

			// kotak suara
			case 'data-suara':
				include "pemilih/suara/data_suara.php";
				break;

			// default
			default :
				echo "<center><h1> ERROR !</h1></center>";
				break;
		}
	} else{
		// auto homepage
		include "home/pemilih.php";
	} ?>
	</main>
</body>
</html>
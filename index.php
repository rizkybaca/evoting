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
	<link rel="stylesheet" type="text/css" href="./dist/css/style.css">
</head>
<body>
	<aside>
		<h4>Halo, <?= $data_nama; ?></h4>
		<h5> <?= $data_level; ?> </h5>
		
		<!-- level -->
		<?php 
		if($data_level=="Administrator")
		{ ?>
			<li>
				<a href="index.php">Home</a>
			</li>
			<li>
				<a href="?page=data-panitia">Data Panitia</a>
			</li>
			<li>
				<a href="?page=data-suara">Quick Count</a>
			</li>
		<?php 
		} elseif ($data_level == "Panitia")
		{ ?>
			<li>
				<a href="index.php">Home</a>
			</li>
			<li>
				<a href="?page=data-calon">Data Kandidat</a>
			</li>
			<li>
				<a href="?page=data-panitia">Data Panitia</a>
			</li>
			<li>
				<a href="?page=data-pemilih">Data Pemilih</a>
			</li>
			<li>
				<a href="?page=data-kotak">Kotak Suara</a>
			</li>
			<li>
				<a href="?page=data-suara">Quick Count</a>
			</li>
		<?php 
		} ?>
		<li>
			<a onclick="return confirm('Apakah Anda yakin akan keluar?')" href="logout.php"><p>Logout</p></a>
		</li>
	</aside>
	<main>
		<?php 
		if (isset($_GET['page'])) {
			$hal = $_GET['page'];

			switch ($hal) {
				//klik homepage
				case 'admin':
					include "home/admin.php";
					break;
				case 'panitia':
					include "home/panitia.php";
					break;
				// case 'pemilih':
				// 	include "home/pemilih.php";
				// 	break;

					//manage data panitia
				case 'data-panitia':
					include "admin/panitia/data_panitia.php";
					break;
				case 'add-panitia':
					include "admin/panitia/add_panitia.php";
					break;
				case 'edit-panitia':
					include "admin/panitia/edit_panitia.php";
					break;
				case 'del-panitia':
					include "admin/panitia/del_panitia.php";
					break;

					//manage data calon
				case 'data-calon':
					include "admin/calon/data_calon.php";
					break;
				case 'add-calon':
					include "admin/calon/add_calon.php";
					break;
				case 'edit-calon':
					include "admin/calon/edit_calon.php";
					break;
				case 'del-calon':
					include "admin/calon/del_calon.php";
					break;

					//manage data pemilih
				case 'data-pemilih':
					include "admin/pemilih/data_pemilih.php";
					break;
				case 'add-pemilih':
					include "admin/pemilih/add_pemilih.php";
					break;
				case 'edit-pemilih':
					include "admin/pemilih/edit_pemilih.php";
					break;
				case 'del-pemilih':
					include "admin/pemilih/del_pemilih.php";
					break;

					//bilik suara
				case 'PsSQAdT':
					include "pemilih/calon/data_calon.php";
					break;
				case 'PsSQBpL':
					include "pemilih/calon/pilih_calon.php";
					break;
				case 'PsSQBBK':
					include "pemilih/calon/buka_calon.php";
					break;

					//kotak suara
				case 'data-kotak':
					include "admin/kotak/data_kotak.php";
					break;
				case 'data-suara':
					include "admin/suara/data_suara.php";
					break;

					//default
				default:
					echo "<center><h1> ERROR !</h1></center>";
					break;
			}
		} else {
			// auto homepage
			if ($data_level=="Administrator"){
				include "home/admin.php";
			} elseif ($data_level=="Panitia"){
				include "home/admin.php";
			// } elseif ($data_level=="Pemilih"){
			// 	include "home/pemilih.php";
			// }
		}
	}
		 ?>
	</main>
</body>
</html>
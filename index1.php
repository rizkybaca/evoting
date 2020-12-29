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
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./dist/css/style2.css">
   <link rel="icon" href="./dist/img/voting.svg">
   <script type="text/javascript" src="./dist/js/Chart.js"></script>
   <title>nge-Vote</title>
</head>

<body>
   <nav>
      <div class="container">
         <div class="logo">
            <img src="./dist/img/voting.svg">
            <div>nge-Vote</div>
         </div>
         <div class="navbar">
            <a href="index1.php" class="home">Home</a>
            <a href="?page=data-suara" class="quick">Quick Count</a>
            <div class="btn">
	            <span>Halo, <?= $data_nama;?></span>
	            <a class="tombol" onclick="return confirm('Apakah Anda yakin akan keluar?')" href="logout.php">
	            <img src="./dist/img/logout.svg">
	            </a>
            </div>
         </div>
      </div>
   </nav>

   <main id="home">
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

   <footer>
      <div class="container">
         <div>Nge-Vote | 2020 | all right reserved</div>
      </div>
   </footer>
</body>

</html>

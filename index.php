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
   <link rel="stylesheet" type="text/css" href="./dist/css/style3.css">
   <link rel="icon" href="./dist/img/voting.svg">
   <title>nge-Vote</title>
</head>
<body>
  <aside>
    <div class="admin">
      <div class="img">
      	<img src="./dist/img/user.png">
      </div>
      <div class="name">Hi, <?= $data_nama; ?></div>
      <div class="status"><?= $data_level; ?></div>
    </div>
    <!-- Level -->
    <?php 
    if ($data_level=="Administrator"){?>
      <div class="navbar">
        <a href="index.php">Home</a>
        <a href="?page=data-suara">Quick Count</a>
        <div class="user-btn">--manage data--</div>
        <div class="user-data">
          <div id="box" class="user-box">
          <a href="?page=data-calon">Kandidat</a>
          <a href="?page=data-pemilih">Pemilih</a>
          <a href="?page=data-panitia">Panitia</a>
          </div>
         </div>
      </div>
    <?php 
    }elseif($data_level == "Panitia"){ ?>
      <div class="navbar">
      <a href="index.php">Home</a>
      <a href="?page=data-kotak">Vote Box</a>
      <a href="?page=data-suara">Quick Count</a>
      <div class="user-btn">--manage data--</div>
      <div class="user-data">
        <div id="box" class="user-box">
        <a href="?page=data-calon">Kandidat</a>
        <a href="?page=data-pemilih">Pemilih</a>
        <a href="?page=data-panitia">Panitia</a>
        </div>
       </div>
    </div>
    <?php 
    } ?>
    <a onclick="return confirm('Apakah Anda yakin akan keluar?')" href="logout.php" class="logout">Log Out</a>
  </aside>

  <div class="content">
    <nav>
       <img src="./dist/img/voting.svg">
       <div>nge-Vote</div>
    </nav>

    <main id="home-admin">
      <?php 
      if(isset($_GET['page'])){
        $hal=$_GET['page'];

        switch ($hal) {
          //klik homepage
          case 'admin':
            include "home/admin";
            break;
          case 'panitia':
            include "home/panitia.php";
            break;
          //manage data panitia
          case 'data-panitia':
            include "admin/panitia/data_panitia.php";
            break;
          case 'add-panitia':
            header("Location: manage-data.php?page=add-panitia");
            break;
          // case 'edit-panitia':
          //   header("Location: manage-data.php?page=edit-panitia&kode=6");
          //   break;
          // case 'del-panitia':
          //   include "admin/panitia/del_panitia.php";
          //   break;

            //manage data calon
          case 'data-calon':
            include "admin/calon/data_calon.php";
            break;
          case 'add-calon':
            header("Location: manage-data.php?page=add-calon");
            break;
          // case 'edit-calon':
          //   header("Location: manage-data.php?page=edit-calon");
          //   break;
          // case 'del-calon':
          //   include "admin/calon/del_calon.php";
          //   break;

            //manage data pemilih
          case 'data-pemilih':
            include "admin/pemilih/data_pemilih.php";
            break;
          case 'add-pemilih':
            header("Location: manage-data.php?page=add-pemilih");
            break;
          // case 'edit-pemilih':
          //   header("Location: manage-data.php?page=edit-pemilih");
          //   break;
          // case 'del-pemilih':
          //   include "admin/pemilih/del_pemilih.php";
          //   break;

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
        }
      }
        ?>
    </main>   
    <footer>
       <div>Nge-Vote | 2020 | all right reserved</div>
    </footer>
  </div>
</body>

</html>
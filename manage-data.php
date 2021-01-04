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
   <script type="text/javascript" src="./plugins/ckeditor/ckeditor.js"></script>
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
      </div>
   </nav>
   
   <main id="add-data">
      <?php 
      if (isset($_GET['page'])) {
        $hal=$_GET['page'];

        switch ($hal){
          //manage data panitia
          case 'data-panitia':
            header("Location: index.php?page=data-panitia");
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
            header("Location: index.php?page=data-calon");
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

          // manage data pemilih
          case 'data-pemilih':
            header("Location: index.php?page=data-pemilih");
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

          // default
          default :
            echo "<center><h1> ERROR !</h1></center>";
            break;
        }
      } ?>
   </main>

   <footer>
      <div class="container">
         <div>Nge-Vote | 2020 | all right reserved</div>
      </div>
   </footer>
</body>

</html>
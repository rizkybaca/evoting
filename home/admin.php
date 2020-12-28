<?php
  $sql = $koneksi->query("SELECT COUNT(ID_CALON) as tot_calon  from tb_calon");
  while ($data= $sql->fetch_assoc()) {
    $calon=$data['tot_calon'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pengguna) as tot_pemilih  from tb_pengguna where level='Pemilih'");
  while ($data= $sql->fetch_assoc()) {
    $pemilih=$data['tot_pemilih'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pengguna) as sudah  from tb_pengguna where level='Pemilih' and status='0'");
  while ($data= $sql->fetch_assoc()) {
    $sudah=$data['sudah'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pengguna) as belum  from tb_pengguna where level='Pemilih' and status='1'");
  while ($data= $sql->fetch_assoc()) {
    $belum=$data['belum'];
  }

?>


<div class="title">Home-Page</div>
<div class="datas">
	<a href="?page=data-pemilih">
	  <div class="data data-pemilih">
			<h2>Overview</h2>
			<div class="num text-lime"><?php echo $pemilih; ?></div>
			<div class="text">Jumlah Keseluruhan Pemilih yang Terdaftar</div>
	  </div>
  </a>
  <a href="?page=data-calon">
	  <div class="data data-kandidat">
			<h2>Overview</h2>
			<div class="num text-cobalt"><?php echo $calon; ?></div>
			<div class="text">Jumlah Kandidat yang Terdaftar</div>
	  </div>
	</a>
  <a href="?page=data-pemilih">
	  <div class="data data-sudah-mencoblos">
			<h2>Overview</h2>
			<div class="num text-violet"><?php echo $sudah; ?></div>
			<div class="text">Jumlah Pemilih yang sudah Mencoblos</div>
	  </div>
	</a>
  <a href="?page=data-pemilih">
	  <div class="data data-belum-mencoblos">
			<h2>Overview</h2>
			<div class="num text-berry"><?php echo $belum; ?></div>
			<div class="text">Jumlah Peserta yang belum Mencoblos</div>
	  </div>
</div>
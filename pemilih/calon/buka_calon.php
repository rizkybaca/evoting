<?php 

if(isset($_GET['kode'])){
  $sql_cek = "SELECT * FROM tb_calon WHERE id_calon='".$_GET['kode']."'";
  $query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
	$kode=$_GET['kode'];
}
 ?>

<div id="voting">
  <section>
  	<?php 
		$sql = $koneksi->query("SELECT * FROM tb_calon WHERE id_calon=$kode");
		while ($data= $sql->fetch_assoc()) { ?>
		<div class="profile">
		  <div class="text">
				<div class="no">Nomor Urut: <?php echo $data['id_calon']; ?></div>
				<div class="name"><?php echo $data['nama_calon']; ?></div>
				<div class="visi"><?php echo $data['visi']; ?></div>
				<div><?= html_entity_decode($data['misi']);?></div>
		  </div>
		  
		  <div class="btn">
				
				<form action="pilih_calon.php" method="GET">
					<a href="?page=PsSQBpL&kode=<?php echo $data['id_calon']; ?>" class="coblos">Coblos</a>
				</form>
				<a href="?page=PsSQAdT" class="kembali">kembali</a>
		  </div>
		</div>
		<div class="img">
		  <img width="400px" src="foto/<?php echo $data['foto_calon']; ?>">
		</div>
		<?php } ?>
  </section>
</div>
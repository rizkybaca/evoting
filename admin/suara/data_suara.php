<div class="title">Quick Count-Page</div>
<div class="table">
  <thead"> 
    <baris>
      <kolom class="no-urut">Nomor Urut</kolom>
      <kolom>Foto</kolom>
      <kolom>Nama</kolom>
      <kolom>Jumlah Suara yang Diperoleh</kolom>
    </baris>
  </thead>
  <tbody>
  	<?php 
		$no=1;
		$sql=$koneksi->query("SELECT * FROM tb_calon");
		while ($data=$sql->fetch_assoc()){
			$id_calon=$data["id_calon"];
		?>
	    <baris>
	      <kolom class="no-urut"><?php echo $data['id_calon']; ?></kolom>
	      <kolom>
	      	<img src="foto/<?php echo $data['foto_calon']; ?>" alt="">
	      </kolom>
	      <kolom><?php echo $data['nama_calon']; ?></kolom>
	      <kolom class="num">
	      	<?php
					$sql_hitung = "SELECT COUNT(id_vote) from tb_vote  where id_calon='$id_calon'";
					$q_hit = mysqli_query($koneksi, $sql_hitung);
					while ($row = mysqli_fetch_array($q_hit)) {
						echo $row[0] . " Suara";
					} ?>
	      </kolom>
	    </baris>
		<?php } ?>
  </tbody>
</div>
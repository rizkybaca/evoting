<div class="title">Vote Box-Page</div>
<div class="table">
  <thead"> 
		<baris>
		  <kolom>Nomor</kolom>
		  <kolom>Nama Kandidat</kolom>
		  <?php if ($data_jenis=='ADM'): ?>
		  	<kolom>ID Pemilih</kolom>
		  <?php endif ?>
		  <kolom>Waktu Memilih</kolom>
		</baris>
  </thead>
  <tbody>
  	<?php 
		$no=1;
		$sql = $koneksi->query("SELECT tb_calon.nama_calon, tb_vote.id_pemilih, tb_vote.waktu FROM tb_vote
				JOIN tb_calon ON tb_vote.id_calon=tb_calon.id_calon
				JOIN tb_pengguna ON tb_vote.id_pemilih=tb_pengguna.id_pengguna
			");
		while($data=$sql->fetch_assoc()) {
		 ?>
			<baris>
			  <kolom><?php echo $no++; ?></kolom>
			  <kolom><?php echo $data['nama_calon']; ?></kolom>
			  <?php if ($data_jenis=='ADM'): ?>
			  	<kolom><?php echo $data['id_pemilih']; ?></kolom>
			  <?php endif ?>
			  <kolom><?php echo $data['waktu']; ?></kolom>
			</baris>
		<?php } ?>
  </tbody>
</div>
<div class="space-between">
	<div class="title">Manage Data-kandidat</div>
		<div class="btn-add-data">
		   <a href="?page=add-calon">Add Data</a>
		</div>
</div>
<div class="table">
  <thead"> 
		<baris>
		  <kolom class="no-urut">Nomor Urut</kolom>
		  <kolom>Foto</kolom>
		  <kolom>Nama</kolom>
		  <kolom>Visi</kolom>
		  <kolom>Misi</kolom>
		  <kolom>Aksi</kolom>
		</baris>
  </thead>
  <tbody>
  	<?php 
		$sql = $koneksi->query("SELECT * FROM tb_calon");
		while ($data= $sql->fetch_assoc()){ ?>
		<baris>
		  <kolom class="no-urut"><?php echo $data['id_calon']; ?></kolom>
		  <kolom>
		  	<img class="foto" src="foto/<?php echo $data['foto_calon']; ?>">
		  </kolom>
		  <kolom><?php echo $data['nama_calon']; ?></kolom>
		  <kolom><?php echo $data['visi']; ?></kolom>
		  <kolom><?php echo $data['misi']; ?></kolom>
		  <kolom>
		  	<a href="?page=edit-calon&kode=<?php echo $data['id_calon']; ?>">
		  		<img class="icon-aksi" src="./dist/img/edit.svg">
		  	</a>
		  	<a onclick="return confirm('apakah Anda yakin hapus data ini?')" href="?page=del-calon&kode=<?php echo $data['id_calon']; ?>">
		  		<img class="icon-aksi" src="./dist/img/delete.svg">
		  	</a>
		  </kolom>
		</baris>
    <?php } ?> 
  </tbody>
</div>
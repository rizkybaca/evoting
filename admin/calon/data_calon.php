<div class="space-between">
	<?php if ($data_jenis=='PAN') { ?>
		<div class="title">Manage Data-Kandidat</div>
		<div class="btn-add-data">
		   <a href="?page=add-calon">Add Data</a>
		</div>
	<?php } elseif ($data_jenis=='ADM') {?>
		<div class="title">Manage Data-Kandidat</div>
	<?php } ?>
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
		  <kolom><?= $data['nama_calon']; ?></kolom>
		  <kolom class="visi"><?= $data['visi']; ?></kolom>
		  <kolom style="flex-direction: column; align-items: center; "><?= html_entity_decode($data['misi']);?></kolom>
		  <kolom>
		  	<?php if ($data_jenis=='PAN') { ?>
			  	<a href="?page=edit-calon&kode=<?php echo $data['id_calon']; ?>">
			  		<img class="icon-aksi" src="./dist/img/edit.svg">
			  	</a>
			  	<a onclick="return confirm('apakah Anda yakin hapus data ini?')" href="?page=del-calon&kode=<?php echo $data['id_calon']; ?>">
			  		<img class="icon-aksi" src="./dist/img/delete.svg">
			  	</a>
			  <?php } elseif ($data_jenis=='ADM') { ?>
						-
				<?php } ?>
		  </kolom>
		</baris>
    <?php } ?> 
  </tbody>
</div>
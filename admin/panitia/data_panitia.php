<div class="space-between">
	<?php if ($data_jenis=='ADM') { ?>
		<div class="title">Manage Data-Panitia</div>
		<div class="btn-add-data">
		   <a href="?page=add-panitia">Add Data</a>
		</div>
	<?php } elseif ($data_jenis=='PAN') {?>
		<div class="title">Manage Data-Panitia</div>
	<?php } ?>
</div>
<div class="table">
  <thead"> 
		<baris>
		  <kolom class="no-urut">Nomor Urut</kolom>
		  <kolom>Nama</kolom>
		  <kolom>Username</kolom>
		  <kolom>Aksi</kolom>
		</baris>
  </thead>
  <tbody>
  	<?php 
		$no=1;
		$sql = $koneksi->query("SELECT * FROM tb_pengguna WHERE jenis='PAN' OR jenis='ADM'");
		while ($data= $sql->fetch_assoc()){ ?>
			<baris>
			  <kolom class="no-urut"><?php echo $no++; ?></kolom>
			  <kolom><?php echo $data['nama_pengguna']; ?></kolom>
			  <kolom><?php echo $data['username']; ?></kolom>
			  <kolom>
			  	<?php if ($data_jenis=='ADM') { ?>
						<a href="?page=edit-panitia&kode=<?php echo $data['id_pengguna']; ?>">
							<img class="icon-aksi" src="./dist/img/edit.svg">
						</a>
						<a onclick="return confirm('apakah Anda yakin hapus data ini?')" href="?page=del-panitia&kode=<?php echo $data['id_pengguna']; ?>">
							<img class="icon-aksi" src="./dist/img/delete.svg">
						</a>
					<?php } elseif ($data_jenis=='PAN') { ?>
						-
					<?php } ?>
			  </kolom>
			</baris>
		<?php } ?>
  </tbody>
</div>
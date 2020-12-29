<div class="space-between">
  <?php if ($data_jenis=='PAN') { ?>
		<div class="title">Manage Data-Pemilih</div>
		<div class="btn-add-data">
		  <a href="?page=add-pemilih">Add Data</a>
		</div>
	<?php } elseif ($data_jenis=='ADM') {?>
		<div class="title">Manage Data-Pemilih</div>
	<?php } ?>
</div>
<div class="table">
  <thead"> 
    <baris>
      <kolom class="no-urut">Nomor Urut</kolom>
      <kolom>Nama</kolom>
      <kolom>Username</kolom>
      <kolom>Status</kolom>
      <kolom>Aksi</kolom>
    </baris>
  </thead>
  <tbody>
  	<?php 
		$no=1;
		$sql = $koneksi->query("SELECT * FROM tb_pengguna WHERE jenis='PST'");
		while ($data= $sql->fetch_assoc()){ ?>
      <baris>
        <kolom class="no-urut"><?php echo $no++; ?></kolom>
        <kolom><?php echo $data['nama_pengguna']; ?></kolom>
        <kolom><?php echo $data['username']; ?></kolom>
        <kolom>
        	<?php $stt=$data['status'];
      		if ($stt=='1'){ ?>
      			<div class="status belum-memilih">
        			Belum Memilih
        		</div>
      		<?php } elseif ($stt=='0'){ ?>
      			<div class="status sudah-memilih">
        			Sudah Memilih
        		</div>
      		<?php } ?>
        </kolom>
        <kolom>
        	<?php if ($data_jenis=='PAN') { ?>
      			<a href="manage-data.php?page=edit-pemilih&kode=<?php echo $data['id_pengguna']; ?>">
      				<img class="icon-aksi" src="./dist/img/edit.svg">
      			</a>
      			<a onclick="return confirm('apakah Anda yakin hapus data ini?')" href="manage-data.php?page=del-pemilih&kode=<?php echo $data['id_pengguna']; ?>">
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
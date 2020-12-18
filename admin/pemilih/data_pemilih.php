<h3>Data Panitia</h3>
<a href="?page=add-pemilih">Tambah data</a>
<br>
<br>
<table border="1" style="border-collapse: collapse;">
	<thead>
		<tr>
			<th width="10%">No.</th>
			<th width="23%">Nama Pemilih</th>
			<th width="23%">Username Akun</th>
			<th width="23%">Status</th>
			<th width="10%">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		$sql = $koneksi->query("SELECT * FROM tb_pengguna WHERE jenis='PST'");
		while ($data= $sql->fetch_assoc()){
		 ?>
			<tr>
				<td>
					<?php echo $no++; ?>
				</td>
				<td>
					<?php echo $data['nama_pengguna']; ?>
				</td>
				<td>
					<?php echo $data['username']; ?>
				</td>
				<td>
					<?php $stt=$data['status'];
					if ($stt=='1'){ ?>
						Belum memilih
					<?php } elseif ($stt=='0'){ ?>
						Sudah memilih
					<?php } ?>
				</td>
				<td>
					<a href="?page=edit-pemilih&kode=<?php echo $data['id_pengguna']; ?>">Edit</a>
					<a onclick="return confirm('apakah Anda yakin hapus data ini?')" href="?page=del-pemilih&kode=<?php echo $data['id_pengguna']; ?>">Hapus</a>
				</td>
			</tr>
		<?php
		} ?>
	</tbody>
</table>
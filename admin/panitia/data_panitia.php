<h3>Data Panitia</h3>
<a href="?page=add-panitia">Tambah data</a>
<br>
<br>
<table>
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Panitia</th>
			<th>Username</th>
			<th>Level</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		$sql = $koneksi->query("SELECT * FROM tb_pengguna WHERE jenis='PAN' OR jenis='ADM'");
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
					<?php echo $data['level']; ?>
				</td>
				<td>
					<?php if ($data_jenis=='ADM') { ?>
						<a href="?page=edit-panitia&kode=<?php echo $data['id_pengguna']; ?>">Edit</a>
						<a onclick="return confirm('apakah Anda yakin hapus data ini?')" href="?page=del-panitia&kode=<?php echo $data['id_pengguna']; ?>">Hapus</a>
					<?php } elseif ($data_jenis=='PAN') { ?>
						Tidak tersedia
					<?php } ?>
				</td>
			</tr>
		<?php
		} ?>
	</tbody>
</table>
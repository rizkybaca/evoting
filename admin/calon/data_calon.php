<h3>Data Kandidat</h3>
<a href="?page=add-calon">Tambah data</a>
<br>
<br>
<table>
	<thead>
		<tr>
			<th width="10%">No. Urut</th>
			<th width="18%">Nama Kandidat</th>
			<th width="23%">Foto Kandidat</th>
			<th>Visi</th>
			<th>Misi</th>
			<th width="10%">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$sql = $koneksi->query("SELECT * FROM tb_calon");
		while ($data= $sql->fetch_assoc()){
		 ?>
			<tr>
				<td>
					<?php echo $data['id_calon']; ?>
				</td>
				<td>
					<?php echo $data['nama_calon']; ?>
				</td>
				<td align="center">
					<img src="foto/<?php echo $data['foto_calon']; ?>" width="150px" />
				</td>
				<td>
					<?php echo $data['visi']; ?>
				</td>
				<td>
					<?php echo $data['misi']; ?>
				</td>
				<td>
					<a href="?page=edit-calon&kode=<?php echo $data['id_calon']; ?>">Edit</a>
					<a onclick="return confirm('apakah Anda yakin hapus data ini?')" href="?page=del-calon&kode=<?php echo $data['id_calon']; ?>">Hapus</a>
				</td>
			</tr>
		<?php
		} ?>
	</tbody>
</table>
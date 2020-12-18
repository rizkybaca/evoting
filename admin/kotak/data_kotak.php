<h3>Kotak Suara</h3>
<br>
<table border="1" style="border-collapse: collapse;">
	<thead>
		<tr>
			<th>No</th>
			<th>Kandidat</th>
			<th>Pemilih</th>
			<th>Waktu Memilih</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=1;
		$sql = $koneksi->query("SELECT * FROM tb_vote
				JOIN tb_calon ON tb_vote.id_calon=tb_calon.id_calon
				JOIN tb_pengguna ON tb_vote.id_pemilih=tb_pengguna.id_pengguna
			");
		while($data=$sql->fetch_assoc()) {
		 ?>
			<tr>
				<td>
					<?php echo $no++; ?>
				</td>
				<td>
					<?php echo $data['nama_calon']; ?>
				</td>
				<td>
					<?php echo $data['id_pemilih']; ?>
				</td>
				<td>
					<?php echo $data['waktu']; ?>
				</td>
			</tr>
		<?php 
		} ?>
	</tbody>
</table>
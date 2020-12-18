<h3>Perolehan Suara</h3>
<br>
<table>
	<thead>
		<tr>
			<th>No Urut</th>
			<th>Nama Kandidat</th>
			<th>Foto Kandidat</th>
			<th>Jumlah Suara</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	$no=1;
	$sql=$koneksi->query("SELECT * FROM tb_calon");
	while ($data=$sql->fetch_assoc()){
		$id_calon=$data["id_calon"];
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
				<h4>
					<?php
					$sql_hitung = "SELECT COUNT(id_vote) from tb_vote  where id_calon='$id_calon'";
					$q_hit = mysqli_query($koneksi, $sql_hitung);
					while ($row = mysqli_fetch_array($q_hit)) {
						echo $row[0] . " Suara";
					}
					?>
				</h4>
			</td>
		</tr>
		<?php 
		} ?>
	</tbody>
</table>
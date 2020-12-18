<?php 

if(isset($_GET['kode'])){
  $sql_cek = "SELECT * FROM tb_calon WHERE id_calon='".$_GET['kode']."'";
  $query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
	$kode=$_GET['kode'];
}
 ?>

<h3>Data Kandidat</h3>
<br>
<a href="?page=PsSQAdT">Kembali</a>
<br>
<br>
<table>
	<thead>
		<tr>
			<th>
				<center>Kandidat Pilihan Anda</center>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$sql = $koneksi->query("SELECT * FROM tb_calon WHERE id_calon=$kode");
		while ($data= $sql->fetch_assoc()) { ?>
			<tr>
				<td align="center">
					<h1><?php echo $data['id_calon']; ?></h1>
					<br>
					<img src="foto/<?php echo $data['foto_calon']; ?>" width="400px" />
					<br>
					<h2><?php echo $data['nama_calon']; ?></h2>
					<br>
					<form action="pilih_calon.php" method="GET">
						<a href="?page=PsSQBpL&kode=<?php echo $data['id_calon']; ?>">Tetapkan Pilihan</a>
					</form>
				</td>
			</tr>
		<?php 
		} ?>
	</tbody>
</table>
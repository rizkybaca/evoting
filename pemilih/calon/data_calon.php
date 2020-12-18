<?php 

$data_id = $_SESSION["ses_id"];
$sql = $koneksi->query("SELECT * FROM tb_pengguna WHERE id_pengguna=$data_id");
while ($data= $sql->fetch_assoc()) {
	$status=$data['status'];
}

if ($status==1) { ?>
	<tbody>
		<?php 
		$sql = $koneksi->query("SELECT * FROM tb_calon");
		while ($data= $sql->fetch_assoc()) { ?>
			<tr>
			 	<h4><?php echo $data['id_calon']; ?></h4>
			</tr>
			<tr>
				<img src="foto/<?php echo $data['foto_calon']; ?>" width="235px" />
			</tr>
			<tr>
				<h3><?php echo $data['nama_calon']; ?></h3>
			</tr>
			<tr>
				<a href="?page=PsSQBBK&kode=<?php echo $data['id_calon']; ?>">Pilih</a>
			</tr>
		<?php 
		} ?>
	</tbody>
<?php 
} elseif ($status==0){ ?>
	<h3>Anda sudah menggunakan Hak Suara dengan baik, Terimakasih.</h3>
<?php 
} ?>
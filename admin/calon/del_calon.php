<?php 

if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM tb_calon WHERE id_calon='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}

$foto= $data_cek['foto_calon'];
if (file_exists("foto/".$foto)){
    unlink("foto/".$foto);
}

$sql_hapus = "DELETE FROM tb_calon WHERE id_calon='".$_GET['kode']."'";
$query_hapus = mysqli_query($koneksi, $sql_hapus);
if ($query_hapus) {
	echo "
  		<script>
				alert('Hapus Data Berhasil!');
				document.location.href = 'index.php?page=data-calon';
			</script>
		";
} else{
	echo "
  		<script>
				alert('Hapus Data Berhasil!');
				document.location.href = 'index.php?page=data-calon';
			</script>
		";
}
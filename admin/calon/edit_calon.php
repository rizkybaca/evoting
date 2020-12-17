<?php

if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM tb_calon WHERE id_calon='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<h3>Ubah data</h3>

<h3>Tambah data</h3>
<form action="" method="POST" enctype="multipart/form-data">
	<ul>
		<li>
			<label for="ini_id">No. Urut</label>
		</li>
		<li>
			<input type="number" name="ini_id" id="ini_id" value="<?php echo $data_cek['id_calon']; ?>" readonly>
		</li>
		<li>
			<label for="ini_nama">Nama</label>
		</li>
		<li>
			<input type="text" name="ini_nama" id="ini_nama" value="<?php echo $data_cek['nama_calon']; ?>">
		</li>
		<li>
			<label for="ini_foto">Foto</label>
		</li>
		<li>
			<img width="40px" src="foto/<?= $data_cek['foto']; ?>">
			<input type="file" name="ini_foto" id="ini_foto">
			<p><font color="red">"Format file .jpg"</font></p>
		</li>
		<li>
			<label for="ini_visi">Visi</label>
		</li>
		<li>
			<input type="text" name="ini_visi" id="ini_visi" value="<?php echo $data_cek['visi']; ?>">
		</li>
		<li>
			<label for="ini_misi">Misi</label>
		</li>
		<li>
			<input type="text" name="ini_misi" id="ini_misi" value="<?php echo $data_cek['misi']; ?>">
		</li>
		<li>
			<input type="submit" name="ubah" value="Simpan">
			<a href="?page=data-calon">Batal</a>
		</li>
	</ul>
</form>

<?php 

$sumber = @$_FILES['foto_calon']['tmp_name'];
$target = 'foto/';
$nama_file = @$_FILES['foto_calon']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);

if (isset ($_POST['ubah'])){

  if(!empty($sumber)){
      $foto= $data_cek['foto_calon'];
          if (file_exists("foto/$foto")){
          unlink("foto/$foto");}

      $sql_ubah = "UPDATE tb_calon SET
          nama_calon='".$_POST['nama_calon']."',
          foto_calon='".$nama_file."',
          visi='".$_POST['visi']."',
          misi='".$_POST['misi']."'
          WHERE id_calon='".$_POST['id_calon']."'";
      $query_ubah = mysqli_query($koneksi, $sql_ubah);

  }elseif(empty($sumber)){
    $sql_ubah = "UPDATE tb_calon SET
        nama_calon='".$_POST['nama_calon']."',
        visi='".$_POST['visi']."',
        misi='".$_POST['misi']."'
        WHERE id_calon='".$_POST['id_calon']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
  }

  if ($query_ubah) {
  	echo "
  		<script>
				alert('Ubah Data Berhasil!');
				document.location.href = 'index.php?page=data-calon';
			</script>
		";
  } else{
  	echo "
  		<script>
				alert('Ubah Data Gagal!');
				document.location.href = 'index.php?page=data-calon';
			</script>
		";
  }
}
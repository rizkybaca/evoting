<?php

if(isset($_GET['kode'])){
    $sql_cek = "SELECT * FROM tb_calon WHERE id_calon='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<section>
   <form action="" method="POST" enctype="multipart/form-data">
      <div class="input">
				<label for="no-urut">Nomor Urut</label>
				<input type="number" name="ini_id" value="<?php echo $data_cek['id_calon']; ?>" readonly>
				<label for="">Nama</label>
				<input type="text" name="ini_nama" value="<?php echo $data_cek['nama_calon']; ?>" required>
				<label for="">Visi</label>
				<textarea name="ini_visi" required><?= $data_cek['visi']; ?></textarea>
				<label for="">Misi</label>
				<textarea name="ini_misi" required><?= $data_cek['misi']; ?></textarea>
				<div class="upload-img">
				  <div class="upload">
						<label for="">Pilih foto di sini <font color="red">"Format file .jpg"</font></label>
						<input type="file" name="ini_foto">
				  </div>
				  <img width="60px" src="foto/<?=$data_cek['foto_calon'];?>">
				</div>
      </div>
      <div class="btn">
      	<input type="submit" name="ubah" value="Tambah">
        <a href="?page=data-calon">Kembali</a>
      </div>
   </form>
</section>

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
          nama_calon='".$_POST['ini_nama']."',
          foto_calon='".$nama_file."',
          visi='".$_POST['ini_visi']."',
          misi='".$_POST['ini_misi']."'
          WHERE id_calon='".$_POST['ini_id']."'";
      $query_ubah = mysqli_query($koneksi, $sql_ubah);

  }elseif(empty($sumber)){
    $sql_ubah = "UPDATE tb_calon SET 
        nama_calon='".$_POST['ini_nama']."',
        visi='".$_POST['ini_visi']."',
        misi='".$_POST['ini_misi']."'
        WHERE id_calon='".$_POST['ini_id']."'";
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
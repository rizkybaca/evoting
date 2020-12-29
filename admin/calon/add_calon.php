<section>
   <form action="" method="POST" enctype="multipart/form-data">
      <div class="input">
				<label for="no-urut">Nomor Urut</label>
				<input type="number" name="ini_id" placeholder="isi nomor urut di sini" required>
				<label for="">Nama</label>
				<input type="text" name="ini_nama" placeholder="isi nama di sini" required>
				<label for="">Visi</label>
				<textarea name="ini_visi" placeholder="isi visi di sini" required></textarea>
				<label for="">Misi</label>
				<textarea name="ini_misi" placeholder="isi misi di sini" required></textarea>
				<div class="upload-img">
				  <div class="upload">
						<label for="">Pilih foto di sini <font color="red">"Format file .jpg"</font></label>
						<input type="file" name="ini_foto">
				  </div>
				</div>
      </div>
      <div class="btn">
      	<input type="submit" name="simpan" value="Tambah">
        <a href="?page=data-calon">Kembali</a>
      </div>
   </form>
</section>

<?php 

function upload(){
	$namaFile=$_FILES['ini_foto']['name'];
  $ukuranFile=$_FILES['ini_foto']['size'];
  $error=$_FILES['ini_foto']['error'];
  $tmpName=$_FILES['ini_foto']['tmp_name'];
  $target='foto/';

  if($error===4){
  	echo "
  		<script>
				alert('Gagal, foto wajib diisi!');
				document.location.href = 'index.php?page=add-calon';
			</script>
		";
  }
  $ekstensiValid=['jpg', 'jpeg'];
  $ekstensiFoto=explode('.', $namaFile);
  $ekstensiFoto=strtolower(end($ekstensiFoto));

  if (in_array($ekstensiFoto, $ekstensiValid)) {
  	if ($ukuranFile>2000000) {
  	echo "
  		<script>
				alert('Gagal, ukuran foto terlalu besar!');
				document.location.href = 'index.php?page=add-calon';
			</script>
		";
  	}
  } else {
  	echo "
  		<script>
				alert('Gagal, silakan unggah foto sesuai ekstensi!');
				document.location.href = 'index.php?page=add-calon';
			</script>
		";
  }

  $namaFileBaru=uniqid();   	
 	$namaFileBaru.='.';
 	$namaFileBaru.=$ekstensiFoto;
 	move_uploaded_file($tmpName, $target.$namaFileBaru);

 	return $namaFileBaru;
}

if (isset ($_POST['simpan'])){
	$id=htmlspecialchars($_POST["ini_id"]);
	$nama=htmlspecialchars($_POST["ini_nama"]);
	$visi=htmlspecialchars($_POST["ini_visi"]);
	$misi=htmlspecialchars($_POST["ini_misi"]);
	$foto=upload();

	$sql_simpan = "INSERT INTO tb_calon (id_calon, nama_calon, foto_calon, visi, misi) VALUES (
	    '$id', '$nama', '$foto', '$visi', '$misi')
	";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "
  		<script>
				alert('Tambah Data Berhasil!');
				document.location.href = 'index.php?page=data-calon';
			</script>
		";
	} else{
		echo "
  		<script>
				alert('Tambah Data Gagal!');
				document.location.href = 'index.php?page=add-calon';
			</script>
		";
	}
}
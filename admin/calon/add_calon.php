<h3>Tambah data</h3>
<form action="" method="POST" enctype="multipart/form-data">
	<ul>
		<li>
			<label for="ini_id">No. Urut</label>
		</li>
		<li>
			<input type="number" name="ini_id" id="ini_id" required>
		</li>
		<li>
			<label for="ini_nama">Nama</label>
		</li>
		<li>
			<input type="text" name="ini_nama" id="ini_nama" required>
		</li>
		<li>
			<label for="ini_foto">Foto</label>
		</li>
		<li>
			<input type="file" name="ini_foto" id="ini_foto" required>
			<p><font color="red">"Format file .jpg"</font></p>
		</li>
		<li>
			<label for="ini_visi">Visi</label>
		</li>
		<li>
			<input type="text" name="ini_visi" id="ini_visi" required>
		</li>
		<li>
			<label for="ini_misi">Misi</label>
		</li>
		<li>
			<input type="text" name="ini_misi" id="ini_misi" required>
		</li>
		<li>
			<input type="submit" name="simpan" value="Simpan">
			<a href="?page=data-calon">Batal</a>
		</li>
	</ul>
</form>

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
  	echo "
  		<script>
				alert('Gagal, silakan unggah foto sesuai ekstensi!');
				document.location.href = 'index.php?page=add-calon';
			</script>
		";
  }

  if ($ukuranFile>2000000) {
  	echo "
  		<script>
				alert('Gagal, ukuran foto terlalu besar!');
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

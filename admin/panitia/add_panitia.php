<main id="add-data">
<section>
	<form action="" method="POST">
	  <div class="input">
			<label for="no-urut">Nama Panitia</label>
			<input type="text" name="ini_nama" placeholder="isi nama disini" required>

			<label for="">Username</label>
			<input type="text" name="ini_username" placeholder="isi username disini" required>

			<label for="">Password</label>
			<input type="password" name="ini_password" placeholder="isi password disini" required>
			<label for="">Level</label>
			<select class="lvl" name="ini_level" required>
				<option value="">- Pilih -</option>
				<option value="Administrator">Administrator</option>
				<option value="Panitia">Panitia</option>
			</select>
	  </div>
	  <div class="btn">
	  	<input type="submit" name="simpan" value="Tambah">
	    <a href="?page=data-panitia">Kembali</a>
	  </div>
	</form>
</section>
</main>

<?php 

if (isset ($_POST['simpan'])){
//mulai proses simpan data
	if ($_POST['ini_level']=='Administrator'){
		$jenis="ADM";
	} else{
		$jenis="PAN";
	}
  $sql_simpan = "INSERT INTO tb_pengguna (nama_pengguna,username,password,level,status,jenis) VALUES (
  '".$_POST['ini_nama']."',
  '".$_POST['ini_username']."',
  '".$_POST['ini_password']."',
  '".$_POST['ini_level']."',
  '1',
  '".$jenis."')";
  $query_simpan = mysqli_query($koneksi, $sql_simpan);
  mysqli_close($koneksi);

  if ($query_simpan) {
  	echo "
  		<script>
				alert('Tambah Data Berhasil!');
				document.location.href = 'index.php?page=data-panitia';
			</script>
		";
  } else{
  	echo "
  		<script>
				alert('Tambah Data Gagal!');
				document.location.href = 'index.php?page=add-panitia';
			</script>
		";
  }
}
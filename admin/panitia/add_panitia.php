<h3>Tambah data</h3>
<form action="" method="POST">
	<ul>
		<li>
			<label for="ini_nama">Nama Panitia</label>
		</li>
		<li>
			<input type="text" name="ini_nama" id="ini_nama" required>
		</li>
		<li>
			<label for="ini_username">Username</label>
		</li>
		<li>
			<input type="text" name="ini_username" id="ini_username" required>
		</li>
		<li>
			<label for="ini_password">Password</label>
		</li>
		<li>
			<input type="password" name="ini_password" id="ini_password" required>
		</li>
		<li>
			<label for="ini_level">Level</label>
		</li>
		<li>
			<select name="ini_level">
				<option>- Pilih -</option>
				<option value="Administrator">Administrator</option>
				<option value="Panitia">Panitia</option>
			</select>
		</li>
		<li>
			<input type="submit" name="simpan" value="Simpan">
			<a href="?page=data-panitia">Batal</a>
		</li>
	</ul>
</form>

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
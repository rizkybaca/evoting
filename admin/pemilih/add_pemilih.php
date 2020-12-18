<?php 
	// generate angka acak untuk password
	$pass_acak=mt_rand(1000, 9999);

 ?>
<h3>Tambah data</h3>
<form action="" method="POST">
	<ul>
		<li>
			<label for="ini_nama">Nama Pemilih</label>
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
			<input type="submit" name="simpan" value="Simpan">
			<a href="?page=data-pemilih">Batal</a>
		</li>
	</ul>
</form>

<?php 

if (isset ($_POST['simpan'])){
  //mulai proses simpan data
  $sql_simpan = "INSERT INTO tb_pengguna (nama_pengguna,username,password,level,status,jenis) VALUES (
  '".$_POST['ini_nama']."',
  '".$_POST['ini_username']."',
  '".$pass_acak."',
  'Pemilih',
  '1',
  'PST')";
  $query_simpan = mysqli_query($koneksi, $sql_simpan);
  mysqli_close($koneksi);

  if ($query_simpan) {
  	echo "
  		<script>
				alert('Tambah Data Berhasil!');
				document.location.href = 'index.php?page=data-pemilih';
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
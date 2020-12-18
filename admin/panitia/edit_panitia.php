<?php 

if(isset($_GET['kode'])){
  $sql_cek = "SELECT * FROM tb_pengguna WHERE id_pengguna='".$_GET['kode']."'";
  $query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}

 ?>

<h3>Ubah data</h3>
<form action="" method="POST">
	<input type="hidden" readonly name="ini_id" value="<?php echo $data_cek['id_pengguna'];?>">
	<ul>
		<li>
			<label for="ini_nama">Nama Panitia</label>
		</li>
		<li>
			<input type="text" name="ini_nama" id="ini_nama" value="<?php echo $data_cek['nama_pengguna'];?>">
		</li>
		<li>
			<label for="ini_username">Username</label>
		</li>
		<li>
			<input type="text" name="ini_username" id="ini_username" value="<?php echo $data_cek['username']; ?>">
		</li>
		<li>
			<label for="pass">Password</label>
		</li>
		<li>
			<input type="password" name="ini_password" id="pass" value="<?php echo $data_cek['password']; ?>">
			<input type="checkbox" id="mybutton" onclick="change()">
		</li>
		<li>
			<label for="ini_level">Level</label>
		</li>
		<li>
			<select name="ini_level">
				<option value="">- Pilih -</option>
				<!-- ambil data level -->
				<?php 
					if ($data_cek['level'] == "Administrator") {
						echo "
							<option value='Administrator' selected>
								Administrator
							</option>
						";
					} else {
						echo "
							<option value='Administrator'>
								Administrator
							</option>
						";
					}
					if ($data_cek['level'] == "panitia") {
						echo "
							<option value='Panitia' selected>
								Panitia
							</option>
						";
					} else {
						echo "
							<option value='Panitia'>
								Panitia
							</option>
						";
					}
				 ?>
			</select>
		</li>
		<li>
			<input type="submit" name="simpan" value="Simpan">
			<a href="?page=data-panitia">Batal</a>
		</li>
	</ul>
</form>
<script type="text/javascript">
	function change(){
	  var x = document.getElementById('pass').type;
	  if (x == 'password') {
      document.getElementById('pass').type = 'text';
      document.getElementById('mybutton').innerHTML;
	  } else{
      document.getElementById('pass').type = 'password';
      document.getElementById('mybutton').innerHTML;
	  }
	}
</script>

<?php 

 if (isset ($_POST['simpan'])){
  $sql_ubah = "UPDATE tb_pengguna SET
      nama_pengguna='".$_POST['ini_nama']."',
      username='".$_POST['ini_username']."',
      password='".$_POST['ini_password']."',
      level='".$_POST['ini_level']."'
      WHERE id_pengguna='".$_POST['ini_id']."'";
  $query_ubah = mysqli_query($koneksi, $sql_ubah);
  mysqli_close($koneksi);

  if ($query_ubah) {
  	echo "
  		<script>
				alert('Ubah Data Berhasil!');
				document.location.href = 'index.php?page=data-panitia';
			</script>
		";
  } else{
  	echo "
  		<script>
				alert('Ubah Data gagal!');
				document.location.href = 'index.php?page=data-panitia';
			</script>
		";
  }
}
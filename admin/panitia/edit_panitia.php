<?php 

if(isset($_GET['kode'])){
  $sql_cek = "SELECT * FROM tb_pengguna WHERE id_pengguna='".$_GET['kode']."'";
  $query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<main id="add-data">
  <section>
		<form action="" method="POST">
			<input type="hidden" readonly name="ini_id" value="<?php echo $data_cek['id_pengguna'];?>">
		  <div class="input">
				<label for="no-urut">Nama Panitia</label>
				<input type="text" name="ini_nama" placeholder="isi nama disini" value="<?php echo $data_cek['nama_pengguna'];?>">

				<label for="">Username</label>
				<input type="text" name="ini_username" placeholder="isi username disini" value="<?php echo $data_cek['username']; ?>">

				<label for="">Password</label>
				<input id="pass" type="password" name="ini_password" placeholder="isi password disini" value="<?php echo $data_cek['password']; ?>">

				<div class="checkbox">
				  <input type="checkbox" name="look-password" id="mybutton" onclick="change()">
				  <label for="look-password">lihat password</label>
				</div>
		  </div>

		  <select class="lvl" name="ini_level">
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
					if ($data_cek['level'] == "Panitia") {
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

		  <div class="btn">
		     <input type="submit" name="simpan" value="Tambah">
		     <a href="?page=data-panitia">Kembali</a>
		  </div>
		</form>
  </section>
</main>


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
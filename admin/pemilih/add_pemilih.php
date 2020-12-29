<?php 
	// generate angka acak untuk password
	$pass_acak=mt_rand(1000, 9999);

 ?>

<main id="add-data">
  <section>
     <form action="" method="POST">
        <div class="input">
          <label for="no-urut">Nama Pemilih</label>
          <input type="text" name="ini_nama" placeholder="isi nama disini" required>

          <label for="">Username</label>
          <input type="text" name="ini_username" placeholder="isi username disini" required>
        </div>
        <div class="btn">
          <input type="submit" name="simpan" value="Tambah">
          <a href="?page=data-pemilih">Kembali</a>
        </div>
     </form>
  </section>
</main>

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
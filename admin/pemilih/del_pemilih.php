<?php 

if(isset($_GET['kode'])){
  $sql_hapus = "DELETE FROM tb_pengguna WHERE id_pengguna='".$_GET['kode']."'";
  $query_hapus = mysqli_query($koneksi, $sql_hapus);

  if ($query_hapus) {
  	echo "
  		<script>
				alert('Hapus Data Berhasil!');
				document.location.href = 'index.php?page=data-pemilih';
			</script>
		";
  } else{
  	echo "
  		<script>
				alert('Hapus Data Gagal!');
				document.location.href = 'index.php?page=data-pemilih';
			</script>
		";
  }
}
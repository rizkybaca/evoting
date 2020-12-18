<?php 

$data_id = $_SESSION["ses_id"];
$tgl=date("Y-m-d H:i:s");

if(isset($_GET['kode'])){
	$sql_simpan = "INSERT INTO tb_vote (id_vote, id_calon, id_pemilih, waktu) VALUES (
          '',
          '".$_GET['kode']."',
          '".$data_id."',
          '".$tgl."');";
  $sql_simpan .= "UPDATE tb_pengguna SET 
		status='0'
		WHERE id_pengguna='".$data_id."'";
  $query_simpan = mysqli_multi_query($koneksi, $sql_simpan);

  if ($query_simpan) {
  	echo "
  		<script>
				alert('Anda Berhasil Memilih!');
				document.location.href = 'index1.php?page=PsSQAdT';
			</script>
		";
  } else{
    echo mysqli_error($koneksi);
  }
}
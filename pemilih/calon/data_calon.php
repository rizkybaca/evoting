<?php 

$data_id = $_SESSION["ses_id"];
$sql = $koneksi->query("SELECT * FROM tb_pengguna WHERE id_pengguna=$data_id");
while ($data= $sql->fetch_assoc()) {
	$status=$data['status'];
}

if ($status==1) { ?>
	<tbody>
		<?php 
		$sql = $koneksi->query("SELECT * FROM tb_calon");
		while ($data= $sql->fetch_assoc()) { ?>
			<a class="ini" href="?page=PsSQBBK&kode=<?= $data['id_calon']; ?>">
				<div class="kandidat">
					<img src="foto/<?php echo $data['foto_calon']; ?>" />
					<div class="no-kandidat"><?php echo $data['id_calon']; ?></div>
					<h3><?php echo $data['nama_calon']; ?></h3>
	      </div>
	    </a>
		<?php 
		} ?>
	</tbody>
<?php 
} elseif ($status==0){ ?>
	<div id="thanks">
      <section>
         <div class="thanks">
            <span>TERIMA KASIH TELAH MENCOBLOS</span>
         </div>
      </section>
   </div>
<?php 
} ?>
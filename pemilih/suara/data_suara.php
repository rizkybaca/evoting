<?php 

$calon=mysqli_query($koneksi, "SELECT nama_calon FROM tb_calon ORDER BY id_calon ASC");
$suara=mysqli_query($koneksi, "SELECT COUNT(id_vote) as s FROM tb_vote GROUP BY id_calon");
?>

<div id="thanks">
	<section class="qc">
		
			<h3>Quick Count</h3>
			<canvas id="myChart"></canvas>
		
	</section>
</div>
<script>
	var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: [<?php while ($p=mysqli_fetch_array($calon)){ echo '"'.$p['nama_calon'].'",';}?>],
				datasets: [{
					label: '# of Votes',
					data: [<?php while ($p=mysqli_fetch_array($suara)){ echo '"'.$p['s'].'",';}?>],
					backgroundColor: [
					'#ffadad',
					'#ffd6a5',
					'#fdffb6',
					'#caffbf',
					'#9bf6ff',
					'#a0c4ff',
					'#bdb2ff',
					'#ffc6ff'
					],
					borderColor: [
					'black',
					'black',
					'black',
					'black',
					'black',
					'black',
					'black',
					'black',
					'black'
					],
					borderWidth: 1
				}]
			},
		});
</script>
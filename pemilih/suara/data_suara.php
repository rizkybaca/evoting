<?php 

$calon=mysqli_query($koneksi, "SELECT nama_calon FROM tb_calon ORDER BY id_calon ASC");
$suara=mysqli_query($koneksi, "SELECT COUNT(id_vote) as s FROM tb_vote GROUP BY id_calon");
?>

<h3>Quick Count</h3>
<br>
<br>

<div style="width: 500px;height: 500px; background-color: #fff" align="center">
		<canvas id="myChart"></canvas>
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
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)'
					],
					borderWidth: 1
				}]
			},
		});
</script>
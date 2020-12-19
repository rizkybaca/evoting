<?php 
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
				labels: ["Rifqi", "Awalif"],
				datasets: [{
					label: '# of Votes',
					data: [26,50],
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
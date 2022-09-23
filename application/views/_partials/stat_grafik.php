<!-- Main row -->
        <div class="row">
          <section class="col-lg-5 connectedSortable">

            <div class="card card-success">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Progress Pencapaian
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="bar-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
		  </section>

          <section class="col-lg-7 connectedSortable">
            <!-- solid sales graph -->
            <div class="card card-info">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Statistik
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

			<?php
			// echo $dataLabels . "<br>";
			?>

			<script>
			$(document).ready(function() {

				var ctx = document.getElementById('bar-chart').getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'doughnut',
					data: {
						labels: ['<?=$qcLabels;?>'],
						datasets: [{
							// label: '# of Tomatoes',
							data: [<?=$qcValues;?>],
							backgroundColor: [
								'rgba(255, 99, 132, 0.5)',
								'rgba(54, 162, 235, 0.2)',
								'rgba(255, 206, 86, 0.2)',
								'rgba(75, 192, 192, 0.2)'
							],
							borderColor: [
								'rgba(255,99,132,1)',
								'rgba(54, 162, 235, 1)',
								'rgba(255, 206, 86, 1)',
								'rgba(75, 192, 192, 1)'
							],
							borderWidth: 1
						}]
					},
					options: {
						//cutoutPercentage: 40,
						responsive: false,
					}
				});
				
				// Sales graph chart
				var dailyChartCanvas = $('#line-chart').get(0).getContext('2d');
				//$('#revenue-chart').get(0).getContext('2d');

				var dailyChartData = {
					labels  : ['<?=$dataLabels;?>'],
					datasets: [
					{
						label               : 'Jml',
						fill                : false,
						borderWidth         : 2,
						lineTension         : 0,
						spanGaps : true,
						// borderColor         : '#efefef',
						pointRadius         : 3,
						pointHoverRadius    : 7,
						// pointColor          : '#efefef',
						// pointBackgroundColor: '#efefef',
						data                : [<?=$dataValues;?>]
					}
					]
				}

				var dailyChartOptions = {
					maintainAspectRatio : false,
					responsive : true,
					legend: {
					display: false,
					},
					scales: {
					xAxes: [{
						ticks : {
						// fontColor: '#efefef',
						},
						gridLines : {
						display : false,
						// color: '#efefef',
						drawBorder: false,
						}
					}],
					yAxes: [{
						ticks : {
						stepSize: 5000,
						// fontColor: '#efefef',
						},
						gridLines : {
						display : true,
						// color: '#efefef',
						drawBorder: false,
						}
					}]
					}
				}

				// This will get the first returned node in the jQuery collection.
				var dailyChart = new Chart(dailyChartCanvas, { 
					type: 'line', 
					data: dailyChartData, 
					options: dailyChartOptions
				})

			});
			</script>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->

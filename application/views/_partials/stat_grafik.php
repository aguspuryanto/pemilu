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
                <!-- <canvas class="chart" id="bar-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
				<?//=json_encode($data1); ?>
				<table class="table">
					<tbody>
						<tr>
							<td class="bg-warning">
								<label class="text-center">Jumlah Relawan</label>
								<div class="text-center">
									<h1><?=$data1['result_elektabilitas'][0]['totrelawan']; ?></h1>
								</div>
							</td>
							<td rowspan="2" class="align-middle bg-light">
								<div class="text-center">
									<h1><span class="badge badge-pill badge-secondary"><?=number_format(($data1['result_elektabilitas'][0]['totrekrut']/$data1['result_elektabilitas'][0]['targetsuara']) * 100, 2); ?>%</span></h1>
								</div>
							</td>
							<td rowspan="2" class="align-middle bg-secondary">
								<div class="text-center">
									<span>Target Suara</span>
									<h1><?=$data1['result_elektabilitas'][0]['targetsuara']; ?></h1>
								</div>
							</td>
						</tr>
						<tr>
							<td class="bg-info">
								<label class="text-center">Jumlah Pendukung</label>
								<div class="text-center">
									<h1><?=$data1['result_elektabilitas'][0]['totpendukung']; ?></h1>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
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

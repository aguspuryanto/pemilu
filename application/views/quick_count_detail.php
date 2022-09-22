<?php include_once('_partials/header.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?=$title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
		
        <!-- Main row -->
        <div class="row">
          <section class="col-lg-12 connectedSortable">

            <div class="card card-success">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  <?=$title; ?>
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-success btn-sm" id="export">
                    <i class="fas fa-file-excel"></i>
                  </button>
                  <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
								<table class="table table-striped">
								<thead>
									<tr>
										<th style="width: 10px">No</th>
										<th><?=$header_title; ?></th>
										<th>Relawan</th>
										<th>Pendukung</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
								<?php if($dataList) :
								$x=1;
								foreach($dataList['result_qc_hasil'] as $item) {
									$linkUrl = ($filter=="5") ? "#": base_url('Dashboard1/detailqc/?filter=' . ($filter) . '&kd_filter='. ($item['kd_kel']));

									$item['nama'] = ($filter=="5") ? $item['nama'] : '<a href="'.$linkUrl.'">'.$item['nama'].'</a>';

									echo '<tr>
										<th scope="row">'.$x.'.</th>
										<td>'.$item['nama'].'</td>
										<td>'.$item['k_1'].'</td>
										<td>'.$item['k_2'].'</td>
										<td>'.$item['k_3'].'</td>
									</tr>';
									$x++;
								}
								endif; ?>
								</tbody>
								</table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
					</section>
				</div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

	<script>
		$(document).ready(function() {
			$('#export').click(function() {
				var titles = [];
				var data = [];
				
				$('.table tr').each(function() {
					data.push($(this));
				});

				csv_data = []

				data.forEach(function(item,index){
					td = item[0].children
					for(i=0;i<td.length;i++){
					
						csv_data.push(td[i].innerText)
					}
				
					csv_data.push('\r\n')
				})

				var downloadLink = document.createElement("a");
				var blob = new Blob(["\ufeff", csv_data]);
				var url = URL.createObjectURL(blob);
				downloadLink.href = url;
				downloadLink.download = "quick_count.csv";
				document.body.appendChild(downloadLink);
				downloadLink.click();
				document.body.removeChild(downloadLink);
			});
		});
	</script>

<?php include_once('_partials/footer.php'); ?>
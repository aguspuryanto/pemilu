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
		<div class="col-12">
			<div class="card card-info">
				<div class="card-header">
					<h3 class="card-title"><?=$title; ?></h3>

					<div class="card-tools">
						<button type="button" class="btn bg-success btn-sm" id="export">
							<i class="fas fa-file-excel"></i>
						</button>
					</div>
				</div>
				<div class="card-body table-responsive" style="height: auto;">
					<form method="get" action="<?=base_url('Dashboard1/pendukung');?>">
						<div class="form-group row">
							<label for="staticEmail" class="col-sm-2 col-form-label">Filter Pencarian</label>
							<div class="col-sm-10">
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="filterby" value="1" <?=($get && $get['filterby']=='1') ? 'checked' : '';?>>
									<label class="form-check-label">NIK</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="filterby" value="2" <?=($get && $get['filterby']=='2') ? 'checked' : '';?>>
									<label class="form-check-label">Nama</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="filterby" value="3" <?=($get && $get['filterby']=='3') ? 'checked' : '';?>>
									<label class="form-check-label">Nohp</label>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div id="example1_filter" class="input-group dataTables_filter">
								<input type="search" class="form-control" value="<?=($get) ? $get['s'] : '';?>" name="s" id="search" placeholder="Pencarian" aria-controls="example1">
								<div class="input-group-append">
									<button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
								</div>
							</div>
						</div>
					</form>
					<table id="example1" class="table text-nowrap">
						<thead>
							<tr>
							<th scope="col">NIK</th>
							<th scope="col">Nama</th>
							<th scope="col">Alamat</th>
							<th scope="col">Kota</th>
							<th scope="col">TPS</th>
							<th scope="col">#</th>
							</tr>
						</thead>
						<tbody>
							<?php if($dataList) :
							foreach($dataList['result_kons'] as $item) {
							echo '<tr>
								<th scope="row">'.$item['nik'].'</th>
								<td>'.$item['nama'].'</td>
								<td>'.$item['alamat'].'</td>
								<td>'.$item['kota'].'</td>
								<td>'.$item['tps'].'</td>
								<th scope="col">
									<a href="'.base_url('Dashboard1/pendukungview?nik=' . $item['nik']).'" data-remote="false" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-eye" aria-hidden="true"></i></a>
								</th>
							</tr>';
							}
							endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		</div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Konstituen Detail</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body p-0">
				
			</div>
		</div>
	</div>
	</div>

  <script>
  $(function () {
	var table = $('#example1').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": false,
		"info": false,
		"autoWidth": false,
		"responsive": true,
		"dom": 'Bfrtip',
		"buttons": [
            'csv', 'excel'
        ],
		initComplete: function() {
			$('.buttons-csv').html('<i class="fas fa-file-text-o" />')
			$('.buttons-excel').html('<i class="fas fa-file-excel" />')
		}
    });

	// Fill modal with content from link href
	$("#exampleModal").on("show.bs.modal", function(e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"));
	});
  });
  </script>

<?php include_once('_partials/footer.php'); ?>

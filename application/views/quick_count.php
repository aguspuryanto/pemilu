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
              </div>
              <div class="card-body">
								<table class="table table-striped">
								<thead>
									<tr>
										<th style="width: 10px">#</th>
										<th style="width: 40px;"></th>
										<th>Nama</th>
										<th>Progress</th>
										<th style="width: 40px;" class="text-center">%</th>
									</tr>
								</thead>
								<tbody>
								<?php if($dataList) :
								foreach($dataList['result_qc'] as $item) {
									echo '<tr>
										<th scope="row">'.$item['id'].'.</th>
										<td><div class="media">
                      <img class="img-circle" style="width:60px;" src="'.endpointImage() . $item['foto'].'"/>
                    </div></td>
										<td>'.$item['nama'].'</td>
										<td>
										<div class="progress progress-xs">
										<div class="progress-bar progress-bar-danger" role="progressbar" style="width: '.$item['persen'].'%"></div>
										</div>
										</td>
										<td><span class="badge bg-danger">'.$item['persen'].'%</span></td>
									</tr>';
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

<?php include_once('_partials/footer.php'); ?>

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
						<th style="width: 10px">#</th>
						<th>Nama</th>
						<th style="width: 40px">Pendukung</th>
					</tr>
				</thead>
				<tbody>
				<?php if($dataList && $dataList['success']==1) :
					foreach($dataList['result_hasil_tim'] as $item) {
						echo '<tr>
							<th scope="row"><a href="'.base_url('Dashboard1/hasiltim/' . $item['kode']).'">'.$item['kode'].'</a></th>
							<td>'.$item['nama'].'</td>
							<td>'.$item['konstituen'].'</td>
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

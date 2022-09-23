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
				</div>
				<div class="card-body table-responsive p-0" style="height: auto;">
					<table class="table table-head-fixed text-nowrap">
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
								<td>#</td>
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

<?php include_once('_partials/footer.php'); ?>

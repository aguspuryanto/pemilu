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
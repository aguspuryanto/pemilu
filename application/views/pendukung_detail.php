<table class="table">
  <tbody>
    <?php if($dataList) :
	foreach($dataList['result_kons'] as $item) { ?>
    <tr>
      <th scope="row">NIK</th>
      <td><?=$item['nik'] ?></td>
      <td colspan="2" rowspan="2">
        <img src="<?=endpointImage() . $item['foto'] ?>" data-src="<?=($item['foto']) ? endpointImage() . $item['foto'] : 'holder.js/75x75' ?>" class="rounded" style="width: 75px; height: 75px;">
      </td>
    </tr>
    <tr>
      <th scope="row">Nama</th>
      <td><?=$item['nama'] ?></td>
    </tr>
    <tr>
      <th scope="row">Alamat</th>
      <td colspan="3"><?=$item['alamat'] ?></td>
    </tr>
    <tr>
      <th scope="row">Kota</th>
      <td colspan="3"><?=$item['kota'] ?></td>
    </tr>
    <tr>
      <th scope="row">Kecamatan</th>
      <td colspan="3"><?=$item['kec'] ?></td>
    </tr>
    <tr>
      <th scope="row">Kelurahan</th>
      <td colspan="3"><?=$item['kel'] ?></td>
    </tr>
    <tr>
      <th scope="row">RT</th>
      <td><?=$item['rt'] ?></td>
      <th scope="row">RW</th>
      <td><?=$item['rw'] ?></td>
    </tr>
    <tr>
      <th scope="row">No HP</th>
      <td colspan="3"><?=$item['hp'] ?></td>
    </tr>
    <tr>
      <th scope="row">No TPS</th>
      <td colspan="3"><?=$item['tps'] ?></td>
    </tr>
    <tr>
      <th scope="row">Catatan</th>
      <td colspan="3"><?=$item['note'] ?></td>
    </tr>
    <tr>
      <th scope="row">Status</th>
      <td colspan="3"><?=($item['isrelawan']==1) ? 'Relawan' : 'Pendukung'; ?></td>
    </tr>
    <tr>
      <th scope="row">KTP</th>
      <td colspan="3">
        <img src="<?=endpointImage() . $item['ktp'] ?>" data-src="<?=($item['ktp']) ? endpointImage() . $item['ktp'] : 'holder.js/75x75' ?>" class="rounded" style="width: 75px; height: 75px;">
      </td>
    </tr>
    <?php
    }
    endif; ?>
  </tbody>
</table>
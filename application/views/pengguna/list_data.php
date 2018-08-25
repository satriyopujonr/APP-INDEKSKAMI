<?php
$no = 1;
  foreach ($dataPengguna as $pengguna) {
    ?>
    <tr>
      <td style="min-width:8px;"><?php echo $no; ?></td>
      <td style="min-width:150px;"><?php echo $pengguna->instansi; ?></td>
      <td><?php echo $pengguna->telp; ?></td>
      <td><?php echo $pengguna->jabatan; ?></td>
      <td style="min-width: 200px"><?php echo $pengguna->alamat; ?></td>
      <td class="text-center" style="min-width:230px;">
         <button class="btn btn-info detail-dataPengguna" data-id="<?php echo $pengguna->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
      </td>
    </tr>
   <?php
    $no++;
  }
?>
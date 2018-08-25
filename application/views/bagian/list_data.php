<?php
  $no = 1;
  foreach ($dataBagian as $bagian) {
    ?>
    <tr>
      <td style="vertical-align: middle; text-align: center;" width="10px"><?php echo $no; ?></td>
      <td style="vertical-align: middle; text-align: justify-all; min-width:200px;"><?php echo $bagian->nama; ?></td>
      <td class="text-center" style="min-width:250px;">
        <button class="btn btn-warning update-dataBagian" data-id="<?php echo $bagian->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-info detail-dataBagian" data-id="<?php echo $bagian->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>
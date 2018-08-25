<?php
  $no = 1;
  foreach ($dataSE as $SE) {
    ?>
    <tr>
      <td style="text-align: center; max-width: 10px;" >1. <?php echo $no; ?></td>
      <td style="text-align: justify; min-width: 780px;"><?php echo $SE->pertanyaan; ?></td>

      <td class="text-center" style="min-width:200px;">
        <button class="btn btn-warning update-dataSE" data-id="<?php echo $SE->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Ubah</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>
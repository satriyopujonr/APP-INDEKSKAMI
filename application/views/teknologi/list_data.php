<?php
  $no = 1;
  foreach ($dataTG as $TG) {
    ?>
    <tr>
      <td style="text-align: center; max-width: 8px;" >6. <?php echo $no; ?></td>
      <td style="text-align: center;  background-color: #ffd2a1;"><?php echo $TG->tingkat_kematangan; ?></td>
      <td style="text-align: center;  background-color: #a1ffb9;"><?php echo $TG->tingkat_kelengkapan; ?></td>
      <td style="text-align: justify; min-width: 700px;"><?php echo $TG->pertanyaan; ?></td>

      <td class="text-center" style="min-width:200px;">
        <button class="btn btn-warning update-dataTG" data-id="<?php echo $TG->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>
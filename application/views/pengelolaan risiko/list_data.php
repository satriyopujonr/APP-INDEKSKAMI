<?php
  $no = 1;
  foreach ($dataPR as $PR) {
    ?>
    <tr>
      <td style="text-align: center; max-width: 8px;" >3. <?php echo $no; ?></td>
      <td style="text-align: center;  background-color: #ffd2a1;"><?php echo $PR->tingkat_kematangan; ?></td>
      <td style="text-align: center;  background-color: #a1ffb9;"><?php echo $PR->tingkat_kelengkapan; ?></td>
      <td style="text-align: justify; min-width: 700px;"><?php echo $PR->pertanyaan; ?></td>

      <td class="text-center" style="min-width:200px;">
        <button class="btn btn-warning update-dataPR" data-id="<?php echo $PR->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>
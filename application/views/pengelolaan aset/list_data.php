<?php
  $no = 1;
  foreach ($dataPA as $PA) {
    ?>
    <tr>
      <td style="text-align: center; max-width: 8px;" >4. <?php echo $no; ?></td>
      <td style="text-align: center;  background-color: #ffd2a1;"><?php echo $PA->tingkat_kematangan; ?></td>
      <td style="text-align: center;  background-color: #a1ffb9;"><?php echo $PA->tingkat_kelengkapan; ?></td>
      <td style="text-align: center;  background-color: #f4c4c4;"><?php echo $PA->kategori; ?></td>
      <td style="text-align: justify; min-width: 600px;"><?php echo $PA->pertanyaan; ?></td>

      <td class="text-center" style="min-width:200px;">
        <button class="btn btn-warning update-dataPA" data-id="<?php echo $PA->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>
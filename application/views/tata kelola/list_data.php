<?php
  $no = 1;
  foreach ($dataTK as $TK) {
    ?>
    <tr>
      <td style="text-align: center; max-width: 8px;" >2. <?php echo $no; ?></td>
      <td style="text-align: center;  background-color: #ffd2a1;"><?php echo $TK->tingkat_kematangan; ?></td>
      <td style="text-align: center;  background-color: #a1ffb9;"><?php echo $TK->tingkat_kelengkapan; ?></td>
      <td style="text-align: justify; min-width: 700px;"><?php echo $TK->pertanyaan; ?></td>

      <td class="text-center" style="min-width:200px;">
        <button class="btn btn-warning update-dataTK" data-id="<?php echo $TK->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Ubah</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>
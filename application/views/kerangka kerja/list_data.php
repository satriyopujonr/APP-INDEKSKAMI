<?php
  $no = 1;
  foreach ($dataKK as $KK) {
    ?>
    <tr>
      <td style="text-align: center; max-width: 8px;" >4. <?php echo $no; ?></td>
      <td style="text-align: center;  background-color: #ffd2a1;"><?php echo $KK->tingkat_kematangan; ?></td>
      <td style="text-align: center;  background-color: #a1ffb9;"><?php echo $KK->tingkat_kelengkapan; ?></td>
      <td style="text-align: center;  background-color: #f4c4c4;"><?php echo $KK->kategori; ?></td>
      <td style="text-align: justify; min-width: 600px;"><?php echo $KK->pertanyaan; ?></td>

      <td class="text-center" style="min-width:200px;">
        <button class="btn btn-warning update-dataKK" data-id="<?php echo $KK->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Ubah</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>
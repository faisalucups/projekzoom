<br><br><br>
<div class="container text-center" style="margin: 2em auto;">
  <!--h2 class="tex-center">Tabel Keluar Room</h2-->
  <a href="<?= base_url('report/KeluarRoomManual') ?>" style="margin-bottom:10px;float:left;" type="button" class="btn btn-danger" name="laporan_data"><i class="fa fa-file-text" aria-hidden="true"></i> Invoice Manual</a>
  <div class="tabel" style="margin-top:80px">
    <table class="table table-bordered table-striped" style="margin: 2em auto;" id="tabel_keluarroom">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Tanggal Masuk</th>
          <th>Tanggal Keluar</th>
          <th>Cabang_si</th>
          <th>Jam</th>
          <th>Selesai</th>
          <th>Topik</th>
          <th>Room</th>
          <th>Jumlah</th>
          <th>Invoice</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php if (is_array($list_data)) { ?>
            <?php $no = 1; ?>
            <?php foreach ($list_data as $dd) : ?>
              <td><?= $no ?></td>
              <td><?= $dd->nama ?></td>
              <td><?= $dd->tanggal_masuk ?></td>
              <td><?= $dd->tanggal_keluar ?></td>
              <td><?= $dd->cabang_si ?></td>
              <td><?= $dd->jam ?></td>
              <td><?= $dd->selesai ?></td>
              <td><?= $dd->topik ?></td>
              <td><?= $dd->room ?></td>
              <td><?= $dd->jumlah ?></td>
              <td><a type="button" class="btn btn-danger btn-report" href="<?= base_url('report/Keluarroom/' . $dd->nama . '/' . $dd->tanggal_keluar) ?>" name="btn_report" style="margin:auto;"><i class="fa fa-file-text" aria-hidden="true"></i></a></td>
        </tr>
        <?php $no++; ?>
      <?php endforeach; ?>
    <?php } else { ?>
      <td colspan="7" align="center"><strong>Data Kosong</strong></td>
    <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#tabel_keluarroom').DataTable();
  });
</script>
<br><br><br>
<div class="container text-center" style="margin: 2em auto;">
  <h2 class="tex-center">Tabel Masuk Room</h2>
  <table class="table table-bordered table-striped" style="margin: 2em auto;" id="tabel_masukroom">
    <thead>
      <tr>
        <th>No</th>
        <th>Id</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Cabang_si</th>
        <th>Jam</th>
        <th>Selesai</th>
        <th>Topik</th>
        <th>Room</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php if (is_array($list_data)) { ?>
          <?php $no = 1; ?>
          <?php foreach ($list_data as $dd) : ?>
            <td><?= $no ?></td>
            <td><?= $dd->id ?> </td>
            <td><?= $dd->nama ?></td>
            <td><?= $dd->tanggal ?></td>
            <td><?= $dd->cabang_si ?></td>
            <td><?= $dd->jam ?></td>
            <td><?= $dd->selesai ?></td>
            <td><?= $dd->topik ?></td>
            <td><?= $dd->room ?></td>
            <td><?= $dd->jumlah ?></td>
      </tr>
      <?php $no++; ?>
    <?php endforeach; ?>
  <?php } else { ?>
    <td colspan="7" align="center"><strong>Data Kosong</strong></td>
  <?php } ?>
    </tbody>
  </table>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#tabel_masukroom').DataTable();
  });
</script>
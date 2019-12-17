<<?php if (!$editable) : ?>
<div class="btn btn-danger">
    Bukan periode Daftar.
</div>
<table class="table table-responsive-sm">
  <thead>
    <tr>
      <th>Nama Mahasiswa</th>
      <th>NIM Mahasiswa</th>
      <th>Dosen Penguji</th>
      <th>Status Verifikasi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $daftar) : ?>
    <tr>
      <td><?= $daftar->nama_mahasiswa?></td>
      <td><?= $daftar->nim_mahasiswa?></td>
      <td><?= $daftar->nama_dosen?></td>
      <td><?php form_verifikasi_widget($daftar->verifikasi_admin) ?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php else : ?>
<table class="table table-responsive-sm">
  <thead>
    <tr>
      <th>Nama Mahasiswa</th>
      <th>NIM Mahasiswa</th>
      <th>Dosen Penguji</th>
      <th>Nilai Pembimbing Lapangan</th>
      <th>File Rekap</th>
      <th>Status Verifikasi</th>
      <th>Action </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $daftar) : ?>
    <tr>
      <td><?= $daftar->nama_mahasiswa?></td>
      <td><?= $daftar->nim_mahasiswa?></td>
      <td><?= $daftar->nama_dosen?></td>
      <td><?= $daftar->nilai_lapangan?></td>
      <td><?= $daftar->file_daftar?></td>
      <td><?php form_verifikasi_widget($daftar->verifikasi_admin) ?></td>
      <td><a href="<?= base_url("admin/daftar/edit/$daftar->id_daftar") ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
      <a href="<?= base_url("admin/daftar/delete/$daftar->id_daftar")?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
    </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?php endif ?>
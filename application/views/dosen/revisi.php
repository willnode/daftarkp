<table class="table table-responsive-sm">
  <thead>
    <tr>
      <th>Nama Mahasiswa</th>
      <th>NIM Mahasiswa</th>
      <th>File Bimbingan</th>
      <th>Status Verifikasi Penguji</th>
      <th>Action </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $revisi) : ?>
    <tr>
      <td><?= $revisi->nama_mahasiswa?></td>
      <td><?= $revisi->nim_mahasiswa?></td>
      <td><?= $revisi->file_revisi?></td>
      <td><?php form_verifikasi_widget($revisi->verifikasi_penguji) ?></td>
      <td><a href="<?= base_url("admin/revisi/edit/$revisi->id_revisi") ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
      <a href="<?= base_url("admin/revisi/delete/$revisi->id_revisi")?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
    </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
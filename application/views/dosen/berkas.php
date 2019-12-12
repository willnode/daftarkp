<table class="table table-responsive-sm">
  <thead>
    <tr>
      <th>Nama Mahasiswa</th>
      <th>NIM Mahasiswa</th>
      <th>File Berkas</th>
      <th>Action </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $berkas) : ?>
    <tr>
      <td><?= $berkas->nama_mahasiswa?></td>
      <td><?= $berkas->nim_mahasiswa?></td>
      <td><?= $berkas->file_berkas?></td>
      <td><a href="<?= base_url("admin/berkas/edit/$berkas->id_berkas") ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
      <a href="<?= base_url("admin/berkas/delete/$berkas->id_berkas")?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
    </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
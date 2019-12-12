<table class="table table-responsive-sm">
  <thead>
    <tr>
      <th>Nama Mahasiswa</th>
      <th>NIM Mahasiswa</th>
      <th>Dosen Penguji</th>
      <th>Action </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $daftar) : ?>
    <tr>
      <td><?= $daftar->nama_mahasiswa?></td>
      <td><?= $daftar->nim_mahasiswa?></td>
      <td><?= $daftar->nama_dosen?></td>
      <td><a href="<?= base_url("admin/daftar/edit/$daftar->id_daftar") ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
      <a href="<?= base_url("admin/daftar/delete/$daftar->id_daftar")?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
    </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
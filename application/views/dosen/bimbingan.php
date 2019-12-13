<?php if (!$editable) : ?>
<div class="btn btn-danger">
    Bukan periode bimbingan.
</div>
<table class="table table-responsive-sm">
  <thead>
    <tr>
      <th>Nama Mahasiswa</th>
      <th>NIM Mahasiswa</th>
      <th>Dosen Pembimbing</th>
      <th>Topik Bimbingan</th>
      <th>File Bimbingan</th>
       </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $bimbingan) : ?>
    <tr>
      <td><?= $bimbingan->nama_mahasiswa?></td>
      <td><?= $bimbingan->nim_mahasiswa?></td>
      <td><?= $bimbingan->nama_dosen?></td>
      <td><?= $bimbingan->topik_bimbingan?></td>
      <td><?= $bimbingan->file_bimbingan?></td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php else :?>

<table class="table table-responsive-sm">
  <thead>
    <tr>
      <th>Nama Mahasiswa</th>
      <th>NIM Mahasiswa</th>
      <th>Dosen Pembimbing</th>
      <th>Topik Bimbingan</th>
      <th>File Bimbingan</th>
      <th>Action </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $bimbingan) : ?>
    <tr>
      <td><?= $bimbingan->nama_mahasiswa?></td>
      <td><?= $bimbingan->nim_mahasiswa?></td>
      <td><?= $bimbingan->nama_dosen?></td>
      <td><?= $bimbingan->topik_bimbingan?></td>
      <td><?= $bimbingan->file_bimbingan?></td>
      <td><a href="<?= base_url("admin/bimbingan/edit/$bimbingan->id_bimbingan") ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
      <a href="<?= base_url("admin/bimbingan/delete/$bimbingan->id_bimbingan")?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
    </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?php endif ?>
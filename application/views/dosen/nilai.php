<?php if (!$editable) : ?>
<div class="btn btn-danger">
    Bukan periode menilai.
</div>
<table class="table table-responsive-sm">
  <thead>
    <tr>
      <th>Nama Mahasiswa</th>
      <th>NIM Mahasiswa</th>
      <th>Nilai Pembimbing</th>
      <th>Nilai Penguji</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $nilai) : ?>
    <tr>
      <td><?= $nilai->nama_mahasiswa?></td>
      <td><?= $nilai->nim_mahasiswa?></td>
      <td><?= $nilai->nilai_pembimbing?></td>
      <td><?= $nilai->nilai_penguji?></td>
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
      <th>Nilai Pembimbing</th>
      <th>Nilai Penguji</th>
      <th>Action </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $nilai) : ?>
    <tr>
      <td><?= $nilai->nama_mahasiswa?></td>
      <td><?= $nilai->nim_mahasiswa?></td>
      <td><?= $nilai->nilai_pembimbing?></td>
      <td><?= $nilai->nilai_penguji?></td>

      <td><a href="<?= base_url("admin/nilai/edit/$nilai->id_nilai") ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
      <a href="<?= base_url("admin/nilai/delete/$nilai->id_nilai")?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
    </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?php endif ?>
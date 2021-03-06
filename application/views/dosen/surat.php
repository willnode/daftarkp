<?php if (!$editable) : ?>
<div class="btn btn-danger">
    Bukan periode surat.
</div>
<table class="table table-responsive-sm">
  <thead>
    <tr>
      <th>Nama Mahasiswa</th>
      <th>NIM Mahasiswa</th>
      <th>Dosen Pembimbing</th>
      <th>Nama Perusahaan</th>
      <th>Alamat Perusahaan</th>
      <th>Jangka Waktu</th>
      <th>File Penolakan</th>
      <th>Status Verifikasi Koordinator</th>
      <th>File Penolakan<th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $surat) : ?>
    <tr>
      <td><?= $surat->nama_mahasiswa?></td>
      <td><?= $surat->nim_mahasiswa?></td>
      <td><?= $surat->nama_dosen?></td>
      <td><?= $surat->nama_perusahaan?></td>
      <td><?= $surat->alamat_perusahaan?></td>
      <td><?= $surat->jangka_waktu?></td>
      <td><?= $surat->file_surat?></td>
      <td><?php form_verifikasi_widget($surat->verifikasi_koordinator) ?></td>
      <td><?= $surat->file_surat?></td>
     </td>
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
      <th>Dosen Pembimbing</th>
      <th>Nama Perusahaan</th>
      <th>Alamat Perusahaan</th>
      <th>Jangka Waktu</th>
      <th>Status Verifikasi Koordinator</th>
      <th>File Penolakan</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $surat) : ?>
    <tr>
      <td><?= $surat->nama_mahasiswa?></td>
      <td><?= $surat->nim_mahasiswa?></td>
      <td><?= $surat->nama_dosen?></td>
      <td><?= $surat->nama_perusahaan?></td>
      <td><?= $surat->alamat_perusahaan?></td>
      <td><?= $surat->jangka_waktu?></td>
      <td><?php form_verifikasi_widget($surat->verifikasi_koordinator) ?></td>
      <td><?= $surat->file_surat?></td>
      <td><a href="<?= base_url("admin/surat/edit/$surat->id_surat") ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
      <a href="<?= base_url("admin/surat/delete/$surat->id_surat")?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
    </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?php endif ?>
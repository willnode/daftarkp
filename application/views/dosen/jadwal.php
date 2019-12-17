<table class="table table-responsive-sm">
  <thead>
    <tr>
      <th>Nama Mahasiswa</th>
      <th>NIM Mahasiswa</th>
      <th>Waktu</th>
      <th>Tempat</th>
      <th>Status Verifikasi Pembimbing</th>
      <th>Status Verifikasi Penguji</th>
      <th>Nama Penguji</th>
      <th>Action 
        <a href="<?= base_url("dosen/jadwal/create")?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $jadwal) : ?>
    <tr>
      <td><?= $jadwal->nama_mahasiswa?></td>
      <td><?= $jadwal->nim_mahasiswa?></td>
      <td><?= $jadwal->waktu?></td>
      <td><?= $jadwal->tempat?></td>
      <td><?php form_verifikasi_widget($jadwal->verifikasi_pembimbing) ?></td>
      <td><?php form_verifikasi_widget($jadwal->verifikasi_penguji) ?></td>
      <td><?= $jadwal->nama_dosen?></td>
      <td><a href="<?= base_url("admin/jadwal/edit/$jadwal->id_jadwal") ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
      <a href="<?= base_url("admin/jadwal/delete/$jadwal->id_jadwal")?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
    </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
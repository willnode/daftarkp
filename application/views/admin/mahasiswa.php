<table class="table table-responsive-sm">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>NIM</th>
                          <th>Prodi</th>
                          <th>Action 

                          <a href="<?= base_url("admin/mahasiswa/create")?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $mahasiswa) : ?>
                        <tr>
                          <td><?= $mahasiswa->nama_mhs?></td>
                          <td><?= $mahasiswa->nim?></td>
                          <td><?= $mahasiswa->nama_prodi?></td>
                          <td><a href="<?= base_url("admin/mahasiswa/edit/$mahasiswa->id_mahasiswa") ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
                          <a href="<?= base_url("admin/mahasiswa/delete/$mahasiswa->id_mahasiswa")?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
<table class="table table-responsive-sm">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>NIP</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $dosen) : ?>
                        <tr>
                          <td><?= $dosen->nama_dosen?></td>
                          <td><?= $dosen->nip_dosen?></td>
                          <td>
                              <a href="<?= base_url("admin/dosen/edit/$dosen->id_dosen") ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> 
                                <a href="<?= base_url("admin/dosen/delete/$dosen->id_dosen")?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
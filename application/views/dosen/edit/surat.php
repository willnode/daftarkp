<form class="form-horizontal" action="<?=base_url("admin/surat/update/$data->id_surat")?>" method="post"
    enctype="multipart/form-data" name="form">
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="id_pembimbing">Dosen Pembimbing</label>
        <div class="col-md-9">
            <select class="form-control form-control" id="id_pembimbing" name="id_pembimbing">
                <?php foreach ($dosen as $d) : ?>
                <option value="<?= $d->id_dosen ?>" <?=$data->id_pembimbing==$d->id_dosen ? 'selected' : ''?>>
                    <?= $d->nama_dosen?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="nama_perusahaan">Nama Perusahaan</label>
        <div class="col-md-9">
            <input class="form-control" id="nama_perusahaan" type="text" name="nama_perusahaan" value="<?= $data->nama_perusahaan?>">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="alamat_perusahaan">Alamat Perusahaan</label>
        <div class="col-md-9">
            <input class="form-control" id="alamat_perusahaan" type="text" name="alamat_perusahaan" value="<?= $data->alamat_perusahaan?>">
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="jangka_waktu">Jangka Waktu</label>
        <div class="col-md-9">
            <input class="form-control" id="jangka_waktu" type="text" name="jangka_waktu" value="<?= $data->jangka_waktu?>">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 col-form-label"></label>
        <div class="col-md-9">
            <input type="submit" class="form-control btn btn-primary" value="Submit">
        </div>
    </div>
</form>
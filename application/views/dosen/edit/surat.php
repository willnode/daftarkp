<form class="form-horizontal" action="<?=base_url("admin/mahasiswa/update/$data->id_mahasiswa")?>" method="post"
    enctype="multipart/form-data" name="form">
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="dosen_pembimbing">Dosen Pembimbing</label>
        <div class="col-md-9">
            <input class="form-control" id="dosen_pembimbing" type="text" name="dosen_pembimbing" value="<?= $data->dosen_pembimbing?>">
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
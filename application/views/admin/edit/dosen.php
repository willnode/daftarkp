<form class="form-horizontal" action="<?=base_url("admin/dosen/update/$data->id_dosen")?>" method="post" enctype="multipart/form-data">
<div class="form-group row">
<label class="col-md-3 col-form-label" for="nip_dosen">NIP</label>
<div class="col-md-9">
    <input class="form-control" id="nip_dosen" type="text" name="nip_dosen" value="<?= $data->nip_dosen?>">
</div>
</div>

<div class="form-group row">
<label class="col-md-3 col-form-label" for="nama_dosen">Nama</label>
<div class="col-md-9">
    <input class="form-control" id="nama_dosen" type="text" name="nama_dosen" value="<?= $data->nama_dosen?>">
</div>
</div>

<div class="form-group row">
        <label class="col-md-3 col-form-label" for="username">Username</label>
        <div class="col-md-9">
            <input class="form-control" id="username" type="text" name="username" value="<?= $data->username?>">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="password">Password</label>
        <div class="col-md-9">
            <input class="form-control" id="password" type="password" name="password">
        </div>
    </div>

<div class="form-group row">
<label class="col-md-3 col-form-label"></label>
<div class="col-md-9">
    <input type="submit" class="form-control btn btn-primary" value="Submit">
</div>
</div>
</form>
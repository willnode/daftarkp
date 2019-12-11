<form class="form-horizontal" action="<?=base_url("admin/dosen/update/$data->id_dosen")?>" method="post" enctype="multipart/form-data">
<div class="form-group row">
<label class="col-md-3 col-form-label" for="nip">NIP</label>
<div class="col-md-9">
    <input class="form-control" id="nip" type="text" name="nip" value="<?= $data->nip_dosen?>">
</div>
</div>

<div class="form-group row">
<label class="col-md-3 col-form-label" for="nama">Nama</label>
<div class="col-md-9">
    <input class="form-control" id="nama" type="text" name="nama" value="<?= $data->nama_dosen?>">
</div>
</div>

<div class="form-group row">
<label class="col-md-3 col-form-label"></label>
<div class="col-md-9">
    <input type="submit" class="form-control btn btn-primary" value="Submit">
</div>
</div>
</form>
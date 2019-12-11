<form class="form-horizontal" action="<?=base_url("admin/mahasiswa/update/$data->id_mahasiswa")?>" method="post"
    enctype="multipart/form-data" name="form">
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="nim">NIM</label>
        <div class="col-md-9">
            <input class="form-control" id="nim" type="text" name="nim" value="<?= $data->nim?>"
                oninput="window.form.username.value = window.form.nim.value+'@student.trunojoyo.ac.id'">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="nama_mhs">Nama</label>
        <div class="col-md-9">
            <input class="form-control" id="nama_mhs" type="text" name="nama_mhs" value="<?= $data->nama_mhs?>">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="prodi">Prodi</label>
        <div class="col-md-9">
            <select class="form-control form-control" id="prodi" name="prodi">
                <?php foreach ($prodi as $p) : ?>
                <option value="<?= $p->id_prodi ?>" <?=$data->prodi==$p->id_prodi ? 'selected' : ''?>>
                    <?= $p->nama_prodi?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="username">Username</label>
        <div class="col-md-9">
            <input class="form-control" id="username" type="text" name="username" readonly value="<?= $data->username?>">
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
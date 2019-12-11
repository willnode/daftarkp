<form class="form-horizontal" action="<?=base_url("admin/mahasiswa/update/$data->id_mahasiswa")?>" method="post"
    enctype="multipart/form-data" name="form">
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="nim_mahasiswa">NIM</label>
        <div class="col-md-9">
            <input class="form-control" id="nim_mahasiswa" type="text" name="nim_mahasiswa" value="<?= $data->nim_mahasiswa?>"
                oninput="window.form.username.value = window.form.nim_mahasiswa.value+'@student.trunojoyo.ac.id'">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="nama_mahasiswa">Nama</label>
        <div class="col-md-9">
            <input class="form-control" id="nama_mahasiswa" type="text" name="nama_mahasiswa" value="<?= $data->nama_mahasiswa?>">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="prodi_mahasiswa">Prodi</label>
        <div class="col-md-9">
            <select class="form-control form-control" id="prodi_mahasiswa" name="prodi_mahasiswa">
                <?php foreach ($prodi_mahasiswa as $p) : ?>
                <option value="<?= $p->id_prodi_mahasiswa ?>" <?=$data->prodi_mahasiswa==$p->id_prodi_mahasiswa ? 'selected' : ''?>>
                    <?= $p->nama_prodi_mahasiswa?></option>
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
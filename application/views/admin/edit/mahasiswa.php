<form class="form-horizontal" action="<?=base_url("admin/mahasiswa/update/$data->id_mahasiswa")?>" method="post"
    enctype="multipart/form-data" name="form">

    <?php form_input(['name'=>'nim_mahasiswa', 'label'=>'NIM', 'value'=>$data->nim_mahasiswa,
             'oninput'=>"window.form.username.value = window.form.nim_mahasiswa.value+'@student.trunojoyo.ac.id'"]) ?>
    <?php form_input(['name'=>'nama_mahasiswa', 'label'=>'Nama', 'value'=>$data->nama_mahasiswa]) ?>
    <?php form_option(['name'=>'prodi_mahasiswa', 'label'=>'Prodi', 'value'=>$data->id_prodi,
                        'options'=>$prodi, 'option_key'=>'id_prodi', 'option_value'=>'nama_prodi']) ?>
    <?php form_input(['name'=>'username', 'label'=>'Username', 'value'=>$data->username]) ?>
    <?php form_input(['name'=>'password', 'label'=>'Password', 'value'=>$data->password, 'type'=>'password']) ?>
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
<form class="form-horizontal" action="<?=base_url("admin/daftar/update/$data->id_daftar")?>" method="post"
    enctype="multipart/form-data" name="form">
    
    <?php form_option(['disabled'=>!$editable, 'name'=>'id_penguji', 'label'=>'Dosen Penguji', 'value'=>$data->id_penguji,
                        'options'=>$dosen, 'option_key'=>'id_dosen', 'option_value'=>'nama_dosen']) ?>
    <?php if (check_jabatan()=='Superadmin' || check_jabatan()=='Admin Prodi' || check_jabatan()=='Koordinator') {
    form_verifikasi(['name'=>'verifikasi_admin', 'label'=>'Verifikasi Admin', 'value'=>$data->verifikasi_admin]);
    }
    ?>
    <?php form_input(['disabled'=>!$editable, 'type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
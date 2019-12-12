<form class="form-horizontal" action="<?=base_url("admin/daftar/update/$data->id_daftar")?>" method="post"
    enctype="multipart/form-data" name="form">
    
    <?php form_option(['name'=>'id_penguji', 'label'=>'Dosen Penguji', 'value'=>$data->id_penguji,
                        'options'=>$dosen, 'option_key'=>'id_dosen', 'option_value'=>'nama_dosen']) ?>

    <?php form_verifikasi(['name'=>'verifikasi_admin', 'label'=>'Verifikasi Admin', 'value'=>$data->verifikasi_admin]) ?>
    
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
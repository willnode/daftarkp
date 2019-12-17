<form class="form-horizontal" action="<?=base_url("admin/jadwal/update/$data->id_jadwal")?>" method="post"
    enctype="multipart/form-data" name="form">
    
    <?php form_input(['disabled'=>!$editable, 'name'=>'waktu', 'label'=>'Waktu', 'value'=>$data->waktu]) ?>
    <?php form_verifikasi(['readonly'=>!$editablePenguji, 'name'=>'verifikasi_penguji', 'label'=>'Verifikasi Penguji', 'value'=>$data->verifikasi_penguji]) ?>
    <?php form_verifikasi(['readonly'=>!$editablePembimbing, 'name'=>'verifikasi_pembimbing', 'label'=>'Verifikasi Pembimbing', 'value'=>$data->verifikasi_pembimbing]) ?>
    <?php form_option(['readonly'=>!$editablePembimbing,'name'=>'id_pembimbing', 'label'=>'Dosen Pembimbing', 'value'=>$data->id_pembimbing,
                        'options'=>$dosen, 'option_key'=>'id_dosen', 'option_value'=>'nama_dosen']) ?>
    
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
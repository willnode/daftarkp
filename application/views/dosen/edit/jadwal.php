<form class="form-horizontal" action="<?=base_url("admin/jadwal/update/$data->id_jadwal")?>" method="post"
    enctype="multipart/form-data" name="form">
    
    <?php form_input(['name'=>'waktu', 'label'=>'Waktu', 'value'=>$data->waktu]) ?>
    <?php form_verifikasi(['name'=>'verifikasi_penguji', 'label'=>'Verifikasi Penguji', 'value'=>$data->verifikasi_penguji]) ?>
    <?php form_verifikasi(['name'=>'verifikasi_pembimbing', 'label'=>'Verifikasi Pembimbing', 'value'=>$data->verifikasi_pembimbing]) ?>
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
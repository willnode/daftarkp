<?php if (!$editable) : ?>
<div class="btn btn-danger">
    Bukan periode mendaftar.
</div>
<?php if ($created) : ?>
<form class="form-horizontal" action="<?=base_url("mahasiswa/daftar/update/")?>" method="post"
    enctype="multipart/form-data" name="form">
     <?php form_option(['readonly'=>true,'name'=>'id_penguji', 'label'=>'Dosen Penguji', 'value'=>$data->id_penguji,
                        'options'=>$dosen, 'option_key'=>'id_dosen', 'option_value'=>'nama_dosen']) ?>
    <?php form_verifikasi(['readonly'=>true, 'label'=>'Verifikasi Admin' ,'value'=>$data->verifikasi_admin]) ?>
</form>
<?php endif ?>

<?php else : ?>
<?php if (!$created) : ?>
<div class="btn btn-danger">
    Data belum masuk. Silahkan diisi
</div>
<?php endif ?>
<form class="form-horizontal" action="<?=base_url("mahasiswa/daftar/update/")?>" method="post"
    enctype="multipart/form-data" name="form">
     <?php form_option(['name'=>'id_penguji', 'label'=>'Dosen Penguji', 'value'=>$data->id_penguji,
                        'options'=>$dosen, 'option_key'=>'id_dosen', 'option_value'=>'nama_dosen']) ?>
    <?php form_verifikasi(['readonly'=>true, 'label'=>'Verifikasi Admin' ,'value'=>$data->verifikasi_admin]) ?>
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
<?php endif ?>
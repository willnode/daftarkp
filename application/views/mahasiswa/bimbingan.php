<?php if (!$editable) : ?>
<div class="btn btn-danger">
    Bukan periode surat.
</div>
<?php if ($created) : ?>
<form class="form-horizontal" action="<?=base_url("mahasiswa/bimbingan/update/")?>" method="post"
    enctype="multipart/form-data" name="form">
    <?php form_option(['readonly'=>true,'name'=>'id_pembimbing', 'label'=>'Dosen Pembimbing', 'value'=>$data->id_pembimbing,
                        'options'=>$dosen, 'option_key'=>'id_dosen', 'option_value'=>'nama_dosen']) ?>
    <?php form_input(['readonly'=>true,'name'=>'topik_bimbingan', 'label'=>'Topik Bimbingan', 'value'=>$data->topik_bimbingan]) ?>
    <?php form_file(['readonly'=>true,'name'=>'file_bimbingan', 'label'=>'File Bimbingan', 'folder'=>'bimbingan', 'value'=>$data->file_bimbingan]) ?>
</form>
<?php endif ?>

<?php else : ?>
<?php if (!$created) : ?>
<div class="btn btn-danger">
    Data belum masuk. Silahkan diisi
</div>
<?php endif ?>
<form class="form-horizontal" action="<?=base_url("mahasiswa/bimbingan/update/")?>" method="post"
    enctype="multipart/form-data" name="form">
    <?php form_option(['name'=>'id_pembimbing', 'label'=>'Dosen Pembimbing', 'value'=>$data->id_pembimbing,
                        'options'=>$dosen, 'option_key'=>'id_dosen', 'option_value'=>'nama_dosen']) ?>
    <?php form_input(['name'=>'topik_bimbingan', 'label'=>'Topik Bimbingan', 'value'=>$data->topik_bimbingan]) ?>
    <?php form_file(['name'=>'file_bimbingan', 'label'=>'File Bimbingan', 'folder'=>'bimbingan', 'value'=>$data->file_bimbingan]) ?>
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
<?php endif ?>
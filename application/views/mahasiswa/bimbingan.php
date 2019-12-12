
<?php if (!$created) : ?>
<div class="btn btn-danger">
    Data belum masuk. Silahkan diisi
</div>
<?php endif ?>
<form class="form-horizontal" action="<?=base_url("mahasiswa/surat/update/")?>" method="post"
    enctype="multipart/form-data" name="form">
    <?php form_input(['name'=>'topik_bimbingan', 'label'=>'Topik Bimbingan', 'value'=>$data->topik_bimbingan]) ?>
    <?php form_input(['name'=>'file_bimbingan', 'label'=>'File Bimbingan','type'=>'file', 'value'=>$data->file_bimbingan]) ?>
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
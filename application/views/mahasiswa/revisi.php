<?php if (!$created) : ?>
<div class="btn btn-danger">
    Data belum masuk. Silahkan diisi
</div>
<?php endif ?>
<form class="form-horizontal" action="<?=base_url("mahasiswa/revisi/update/")?>" method="post"
    enctype="multipart/form-data" name="form">
    <?php form_file(['name'=>'file_revisi', 'label'=>'File Revisi','folder'=> 'revisi', 'value'=>$data->file_revisi]) ?>
    <?php form_verifikasi(['readonly'=>'', 'label'=>'Verifikasi Penguji' ,'value'=>$data->verifikasi_penguji]) ?>
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>

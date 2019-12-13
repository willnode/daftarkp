
<?php if (!$created) : ?>
<div class="btn btn-danger">
    Data belum masuk. Silahkan diisi
</div>
<?php endif ?>
<form class="form-horizontal" action="<?=base_url("mahasiswa/berkas/update/")?>" method="post"
    enctype="multipart/form-data" name="form">
    <?php form_file(['name'=>'file_berkas', 'label'=>'File Berkas', 'folder'=>'berkas', 'value'=>$data->file_berkas]) ?>
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
<form class="form-horizontal" action="<?=base_url("admin/revisi/update/$data->id_revisi")?>" method="post"
    enctype="multipart/form-data" name="form">
    
    <?php form_file(['name'=>'file_revisi', 'label'=>'File Revisi', 'folder'=>'revisi','value'=>$data->file_revisi]) ?>
    <?php form_verifikasi(['name'=>'verifikasi_penguji', 'label'=>'Verifikasi Penguji', 'value'=>$data->verifikasi_penguji]) ?>
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
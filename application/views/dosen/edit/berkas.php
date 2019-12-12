<form class="form-horizontal" action="<?=base_url("admin/berkas/update/$data->id_berkas")?>" method="post"
    enctype="multipart/form-data" name="form">
    
    <?php form_file(['name'=>'file_berkas', 'label'=>'File Berkas', 'folder'=>'final','value'=>$data->file_berkas]) ?>
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
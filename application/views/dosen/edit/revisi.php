<form class="form-horizontal" action="<?=base_url("admin/revisi/update/$data->id_revisi")?>" method="post"
    enctype="multipart/form-data" name="form">
    
    <?php form_input(['name'=>'file_revisi', 'label'=>'File Revisi', 'type'=>'file']) ?>
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
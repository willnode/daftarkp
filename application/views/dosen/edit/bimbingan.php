<form class="form-horizontal" action="<?=base_url("admin/bimbingan/update/$data->id_bimbingan")?>" method="post"
    enctype="multipart/form-data" name="form">
    
    <?php form_option(['name'=>'id_pembimbing', 'label'=>'Dosen Pembimbing', 'value'=>$data->id_pembimbing,
                        'options'=>$dosen, 'option_key'=>'id_dosen', 'option_value'=>'nama_dosen']) ?>
    
    <?php form_input(['name'=>'topik_bimbingan', 'label'=>'Topik Bimbingan', 'value'=>$data->topik_bimbingan]) ?>
    <?php form_file(['name'=>'file_bimbingan', 'label'=>'File Bimbingan', 'folder'=>'bimbingan','value'=>$data->file_bimbingan]) ?>
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
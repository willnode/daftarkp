<form class="form-horizontal" action="<?=base_url("admin/jadwal/update/$data->id_jadwal")?>" method="post"
    enctype="multipart/form-data" name="form">
    
    <?php form_input(['name'=>'waktu', 'label'=>'Waktu', 'value'=>$data->waktu]) ?>
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
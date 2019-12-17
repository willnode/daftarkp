<form class="form-horizontal" action="<?=base_url("admin/nilai/update/$data->id_nilai")?>" method="post"
    enctype="multipart/form-data" name="form">

    <?php form_input(['disabled'=>!$editablePembimbing, 'name'=>'nilai_pembimbing', 'label'=>'Nilai Pembimbing', 'value'=>$data->nilai_pembimbing]) ?>
    <?php form_input(['disabled'=>!$editablePenguji, 'name'=>'nilai_penguji', 'label'=>'Nilai Penguji', 'value'=>$data->nilai_penguji]) ?>
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
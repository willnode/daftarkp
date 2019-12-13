<?php if (!$created) : ?>
<div class="btn btn-danger">
    Data belum masuk. Silahkan diisi
</div>
<?php endif ?>
<form class="form-horizontal" action="<?=base_url("mahasiswa/jadwal/update/")?>" method="post"
    enctype="multipart/form-data" name="form">
    <?php form_input(['readonly'=>true, 'label' => 'Waktu', 'value'=>$data->waktu]) ?>
    <?php form_verifikasi(['readonly'=>true, 'label'=>'Verifikasi Penguji' ,'value'=>$data->verifikasi_penguji]) ?>
    <?php form_verifikasi(['readonly'=>true, 'label'=>'Verifikasi Pembimbing' ,'value'=>$data->verifikasi_pembimbing]) ?>

</form>

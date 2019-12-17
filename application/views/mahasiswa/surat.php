<?php if (!$editable) : ?>
<div class="btn btn-danger">
    Bukan periode surat.
</div>
<?php if ($created) : ?>

<?php form_input(['readonly'=>true, 'label'=>'Nama Perusahaan', 'value'=>$data->nama_perusahaan]) ?>
<?php form_input(['readonly'=>true, 'name'=>'alamat_perusahaan', 'label'=>'Alamat Perusahaan', 'value'=>$data->alamat_perusahaan]) ?>
<?php form_input(['readonly'=>true, 'name'=>'jangka_waktu', 'label'=>'Jangka Waktu', 'value'=>$data->jangka_waktu]) ?>
<?php form_file(['readonly'=>'true', 'label'=>'File penolakan', 'folder'=>'surat','value'=>$data->file_surat]) ?>
<?php endif ?>

<?php else : ?>

<?php if (!$created) : ?>
<div class="btn btn-danger">
    Data belum masuk. Silahkan diisi
</div>
<?php endif ?>
<form class="form-horizontal" action="<?=base_url("mahasiswa/surat/update/")?>" method="post"
    enctype="multipart/form-data" name="form">
    <?php form_input(['name'=>'nama_perusahaan', 'label'=>'Nama Perusahaan', 'value'=>$data->nama_perusahaan]) ?>
    <?php form_input(['name'=>'alamat_perusahaan', 'label'=>'Alamat Perusahaan', 'value'=>$data->alamat_perusahaan]) ?>
    <?php form_input(['name'=>'jangka_waktu', 'label'=>'Jangka Waktu', 'value'=>$data->jangka_waktu]) ?>
    <?php form_file(['label'=>'File penolakan', 'folder'=>'surat','value'=>$data->file_surat]) ?>
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
<?php endif ?>

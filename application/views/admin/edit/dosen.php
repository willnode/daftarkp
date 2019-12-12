<form class="form-horizontal" action="<?=base_url("admin/dosen/update/$data->id_dosen")?>" method="post" enctype="multipart/form-data">
<?php form_input(['name'=>'nip_dosen', 'label'=>'NIP', 'value'=>$data->nip_dosen]) ?>
<?php form_input(['name'=>'nama_dosen', 'label'=>'Nama', 'value'=>$data->nama_dosen]) ?>
<?php form_input(['name'=>'username', 'label'=>'Username', 'value'=>$data->username]) ?>
<?php form_input(['name'=>'password', 'label'=>'Password', 'value'=>$data->password]) ?>
<?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
</form>
<form class="form-horizontal" action="<?=base_url("admin/dashboard/update/")?>" method="post"
    enctype="multipart/form-data" name="form">
	<div class="row">
	<div class="col-md-6">
		<h1>Selamat Pagi, <?=$profil->nama?></h1>
		<h3>Status Akun: <?=$profil->jabatan?></h3>
	</div>
	<div class="col-md-6">
	<?php foreach ($config as $c) {
		form_option(['name'=>$c->key, 'label'=>$c->name, 'value'=>$c->value,
					'options'=> [
						(object)['key'=>'N', 'value'=>'Nonaktif'],
						(object)['key'=>'Y', 'value'=>'Aktif']
					], 'option_key'=>'key', 'option_value'=>'value']);
	} ?>
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>

	</div>

	</div>

	</form>
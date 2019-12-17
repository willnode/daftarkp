<form class="form-horizontal" action="<?=base_url("admin/surat/update/$data->id_surat")?>" method="post"
    enctype="multipart/form-data" name="form">
    <?php form_option(['name'=>'id_pembimbing', 'label'=>'Dosen Pembimbing', 'value'=>$data->id_pembimbing,
                        'options'=>$dosen, 'option_key'=>'id_dosen', 'option_value'=>'nama_dosen']) ?>
    
    <?php form_input(['name'=>'nama_perusahaan', 'label'=>'Nama Perusahaan', 'value'=>$data->nama_perusahaan]) ?>
    <?php form_input(['name'=>'alamat_perusahaan', 'label'=>'Alamat Perusahaan', 'value'=>$data->alamat_perusahaan]) ?>
    <?php form_input(['name'=>'jangka_waktu', 'label'=>'Jangka Waktu', 'value'=>$data->jangka_waktu]) ?>
    <?php form_file(['name'=>'file_surat', 'label'=>'File Surat', 'folder'=>'surat', 'value'=>$data->file_surat]) ?>
    <?php if (check_jabatan() == 'Koordinator' || check_jabatan() == 'Superadmin'){
        form_verifikasi(['name'=>'verifikasi_koordinator', 'label'=>'Verifikasi Koordinator', 'value'=>$data->verifikasi_koordinator]);
    }
    ?>
    <?php form_input(['type'=>'submit', 'class'=>'form-control btn btn-primary', 'value'=>"Submit"]) ?>
    
</form>
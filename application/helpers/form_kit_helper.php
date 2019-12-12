<?php

function form_input($attr=[]) {
    $name = isset($attr['name']) ? $attr['name'] : '';
    $label = isset($attr['label']) ? $attr['label'] : '';
    $attr['class'] = isset($attr['class']) ? $attr['class'] : 'form-control';
    ?>
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="<?=$name?>"><?=$label?></label>
        <div class="col-md-9">
            <input id="<?=$name?>" <?= implode(' ', array_map(
                            function ($k, $v) { return $k .'="'. htmlspecialchars($v) .'"'; },
                            array_keys($attr), $attr
                        ))  ?>>
        </div>
    </div>

    <?php
}


function form_option($attr=[]) {
    $name = isset($attr['name']) ? $attr['name'] : '';
    $label = isset($attr['label']) ? $attr['label'] : '';
    $attr['class'] = isset($attr['class']) ? $attr['class'] : 'form-control';
    $options = $attr['options'];
    unset($attr['options']);
    ?>
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="<?=$name?>"><?=$label?></label>
        <div class="col-md-9">
            <select id="<?=$name?>" <?= implode(' ', array_map(
                            function ($k, $vv) { return $k .'="'. htmlspecialchars($vv) .'"'; },
                            array_keys($attr), $attr
                        ))  ?>>
                <?php foreach ($options as $v) : ?>
                <option value="<?= $v->{$attr['option_key']} ?>" <?=$attr['value']==$v->{$attr['option_key']} ? 'selected' : ''?>>
                    <?= $v->{$attr['option_value']}?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <?php
}

function form_file($attr=[]) {
    $name = isset($attr['name']) ? $attr['name'] : '';
    $label = isset($attr['label']) ? $attr['label'] : '';
    $file = './uploads/'.$attr['folder'].'/'.$attr['value'];
    $attr['class'] = isset($attr['class']) ? $attr['class'] : 'form-control';
    ?>
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="<?=$name?>"><?=$label?></label>
        <div class="col-md-9">
            <?php if (!isset($attr['readonly'])) : ?>
            <input id="<?=$name?>" type="file" <?= implode(' ', array_map(
                            function ($k, $v) { return $k .'="'. htmlspecialchars($v) .'"'; },
                            array_keys($attr), $attr
                        ))  ?>>
            <?php endif ?>
            <?php if ($attr['value'] && file_exists($file)) : ?>
            <div class="form-control form-control mt-2 p-2 h-auto">
            <a href="<?=base_url($file)?>" class="btn btn-info mr-auto"><i class="fa fa-download"></i> Unduh</a>
            <span><?=$attr['value']?></span>
            </div>
            <?php endif ?>
        </div>
    </div>

    <?php
}

function form_verifikasi($attr=[]) {
    $name = isset($attr['name']) ? $attr['name'] : '';
    $label = isset($attr['label']) ? $attr['label'] : '';
    $readonly = isset($attr['readonly']); 
    $attr['class'] = isset($attr['class']) ? $attr['class'] : 'form-control';
    $opts = implode(' ', array_map(
                            function ($k, $v) { return $k .'="'. htmlspecialchars($v) .'"'; },
                            array_keys($attr), $attr
                        ))
    ?>
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="<?=$name?>"><?=$label?></label>
        <div class="col-md-9">
            <?php if ($readonly) : ?>
                <label class="btn <?=[''=>'btn-primary','Y'=>'btn-success','N'=>'btn-danger'][$attr['value']]?> active">
                <?=[''=>'Pending','Y'=>'Disetujui','N'=>'Ditolak'][$attr['value']]?>
                </label>
            <?php else : ?>
            <div class="btn-group btn-group-toggle form-control w-auto h-auto" data-toggle="buttons">
            <label class="btn btn-outline-primary active">
                <input type="radio" <?=$opts?> <?=$attr['value'] == '' ? 'checked' : ''?> > Pending
            </label>
            <label class="btn btn-outline-success">
            <input type="radio" <?=$opts?> <?=$attr['value'] == 'Y' ? 'checked' : ''?> > Disetujui
            </label>
            <label class="btn btn-outline-danger">
            <input type="radio" <?=$opts?> <?=$attr['value'] == 'N' ? 'checked' : ''?> > Ditolak
            </label>
            </div>
            <?php endif ?>
        </div>
    </div>

    <?php
}

function form_file_upload($name, $folder)
{
    #mkdir('./uploads/'.$folder.'/');
    $ci = &get_instance();
    $ci->upload->initialize([
        'upload_path' => './uploads/'.$folder.'/',
        'allowed_types' => '*'
    ]);
    if ($ci->upload->do_upload($name)) {
        return $ci->upload->file_name;    
    }
    else {
        return '';
    }
}
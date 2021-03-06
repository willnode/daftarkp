<?php

function form_input($attr=[]) {
    $name = isset($attr['name']) ? $attr['name'] : '';
    $label = isset($attr['label']) ? $attr['label'] : '';
    $attr['class'] = isset($attr['class']) ? $attr['class'] : 'form-control';
    if (isset($attr['disabled']) && !$attr['disabled']) {
        unset($attr['disabled']);
    }
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

function form_textarea($attr=[]) {
    $name = isset($attr['name']) ? $attr['name'] : '';
    $label = isset($attr['label']) ? $attr['label'] : '';
    $attr['class'] = isset($attr['class']) ? $attr['class'] : 'form-control';
    $value = isset($attr['value']) ? $attr['value'] : '';
    unset($attr['value'])
    ?>
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="<?=$name?>"><?=$label?></label>
        <div class="col-md-9">
            <textrea id="<?=$name?>" <?= implode(' ', array_map(
                            function ($k, $v) { return $k .'="'. htmlspecialchars($v) .'"'; },
                            array_keys($attr), $attr
                        ))  ?>><?=htmlspecialchars($value)?></textarea>
        </div>
    </div>

    <?php
}

function form_option($attr=[]) {
    $name = isset($attr['name']) ? $attr['name'] : '';
    $label = isset($attr['label']) ? $attr['label'] : '';
    $attr['class'] = isset($attr['class']) ? $attr['class'] : 'form-control';
    $options = $attr['options'];
    if (isset($attr['disabled']) && !$attr['disabled']) {
        unset($attr['disabled']);
    }
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

function form_verifikasi_widget($val) {
    ?>
    <label class="btn <?=[''=>'btn-primary','Y'=>'btn-success','N'=>'btn-danger'][$val]?> active">
                <?=[''=>'Pending','Y'=>'Disetujui','N'=>'Ditolak'][$val]?>
                </label>
    <?php
}

function form_verifikasi($attr=[]) {
    $name = isset($attr['name']) ? $attr['name'] : '';
    $label = isset($attr['label']) ? $attr['label'] : '';
    $value = $attr['value'];
    unset($attr['value']);
    $readonly = isset($attr['readonly']) && $attr['readonly'];
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
                <?php form_verifikasi_widget($value) ?>
            <?php else : ?>
            <div class="btn-group btn-group-toggle form-control w-auto h-auto" data-toggle="buttons">
            <label class="btn btn-outline-primary <?=$value == '' ? 'active' : ''?>">
                <input type="radio" <?=$opts?> value="" <?=$value == '' ? 'checked' : ''?> > Pending
            </label>
            <label class="btn btn-outline-success <?=$value == 'Y' ? 'active' : ''?>">
            <input type="radio" <?=$opts?> value="Y" <?=$value == 'Y' ? 'checked' : ''?> > Disetujui
            </label>
            <label class="btn btn-outline-danger <?=$value == 'N' ? 'active' : ''?>">
            <input type="radio" <?=$opts?> value="N" <?=$value == 'N' ? 'checked' : ''?> > Ditolak
            </label>
            </div>
            <?php endif ?>
        </div>
    </div>

    <?php
}

function form_file_upload($name, $folder)
{
    if (!file_exists("./uploads/$folder/")) {
        mkdir("./uploads/$folder/", 0777, true);
    }
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
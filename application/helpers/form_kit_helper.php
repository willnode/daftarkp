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
            <?php if (file_exists($file)) : ?>
            <a href="<?=base_url($file)?>" class="btn btn-info"><i class="fa fa-download"></i> Unduh</a>
            <?php endif ?>
        </div>
    </div>

    <?php
}

function form_file_upload($name, $folder)
{
    $this->upload->initialize([
        'upload_path' => './uploads/'.$folder.'/',
    ]);
    return $this->upload->do_upload($name);
}
<?php
function check_config($name)
{
    $ci = &get_instance();
    return $ci->db->get_where('config', ['key' => $name])->row()->value == 'Y';
}

function check_jabatan()
{
    $ci = &get_instance();
    if ($ci->session->role=='admin'){
        return $ci->session->jabatan;
    } else {
        return  $ci->session->role;
    }
}
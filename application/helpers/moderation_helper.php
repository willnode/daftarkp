<?php
function check_config($name)
{
    $ci = &get_instance();
    return $ci->db->get_where('config', ['key' => $name])->row()->value == 'Y';
}
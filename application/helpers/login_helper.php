<?php

function is_logged_in()
{
    $ci = get_instance();
    if ( !$ci->session->userdata('email')) {
        redirect('auth');
    } else {

        // Cek role id nya
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1); // <- untuk ambil data dari menu Admin, User, Menu menggunnakan segment dari URI

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        // Cek id dari user 1 atau 2
        if ( $userAccess->num_rows() < 1 ) {

            redirect('auth/forbidden');
        }
    }
}

function check_access($role_id, $menu_id) 
{
    $ci = get_instance();

    $result = $ci->db->get_where('user_access_menu', [
        'role_id' => $role_id,
        'menu_id' => $menu_id
    ]);

    if ( $result->num_rows() > 0 ) {
        return "checked='checked'";
    }
}
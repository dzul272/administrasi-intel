<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('asset')) {
    function asset($path = NULL)
    {
        return base_url("assets/$path");
    }
}

if (!function_exists('asset_file_desa')) {
    function asset_file_desa($path = NULL)
    {
        $CI = &get_instance();
        return base_url(LOKASI_FILE . underscore($CI->userData->nama_desa) . "/" . $path);
    }
}


if (!function_exists('urlNik')) {
    function urlNik()
    {
        return base_url("api/carinik/");
    }
}


if (!function_exists('cariNikJson')) {
    function cariNikJson($nik = NULL)
    {
        $CI = &get_instance();
        if ($nik == NULL) {
            $CI = &get_instance();
            $nikParam = $CI->input->get('nik');
            $nik = $nikParam;
        }
        $desa       = $CI->m_data->getWhere("id_desa", $CI->session->userdata(SESSION_SISDES)->id_desa);
        $desa       = $CI->m_data->getData("desa")->row();
        $path       = !empty($desa->path_desa) ? $desa->path_desa : "";
        $userid     = !empty($desa->userid_desa) ? $desa->userid_desa : "";
        $password   = !empty($desa->password_desa) ? $desa->password_desa : "";

        $url    = "http://durenmas.banjarnegarakab.go.id:8081/ws_server/get_json/" . $path;
        $url    .= "/carinik?USER_ID=" . $userid;
        $url    .= "&PASSWORD=" . $password;
        $url    .= "&NIK=" . $nik;

        $client = new \GuzzleHttp\Client();
        $response = $client->request("GET", $url);
        $data = json_decode($response->getBody());
        if (!isset($data->content->RESPON)) {
            //ketemu
            $data->respon_code      = 1;
            $data->respon_message   = "Data ditemukan di Dindukcapil";
        } else {
            //ga ketemu
            $data->respon_code = 0;
            $data->respon_message   = "Gagal : " . $data->content->RESPON;
        }
        return json_encode($data);
    }
}

if (!function_exists("validasiRole")) {
    function validasiRole($akses = "")
    {
        $CI = &get_instance();
        foreach ($CI->userData->role->detail as $detail) {
            if (strtolower($akses) == strtolower($detail->route_akses)) {
                return TRUE;
            }
        }
        return FALSE;
    }
}

if (!function_exists("namaRole")) {
    function namaRole($akses = "")
    {
        $CI = &get_instance();
        // d($CI->userData->role->detail[0]->route_akses);
        foreach ($CI->userData->role->detail as $detail) {
            if (strtolower($akses) == strtolower($detail->route_akses)) {
                return $detail->nama_akses;
            }
        }
        return "";
    }
}

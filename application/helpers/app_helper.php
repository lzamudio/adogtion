<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('display_error_msjs')) {

    function display_error_msjs($return = false) {
        $CI = &get_instance();
        $mjs = $CI->session->flashdata('error');

        if (function_exists("validation_errors") && validation_errors()) {
            $validation_errors = validation_errors();
        } else {
            $validation_errors = "";
        }

        if (!$mjs) {
            $mjs = '';
        }

        $body = '';

        if ($mjs || $validation_errors) {
            $body .= '<div class="alert alert-danger">';
            $body .= $validation_errors;
            $body .= $mjs;
            $body .= '</div>';
        }

        if ($return) {
            return $body;
        } else {
            echo $body;
        }
    }

}

if (!function_exists('display_success_msjs')) {

    function display_success_msjs($return = false) {
        $CI = &get_instance();
        $mjs = $CI->session->flashdata('message');

        if (!$mjs) {
            $mjs = '';
        }

        $body = '';

        if ($mjs) {
            $body .= '<div class="alert alert-success">';
            $body .= $mjs;
            $body .= '</div>';
        }

        if ($return) {
            return $body;
        } else {
            echo $body;
        }
    }

}

function theme_url($uri) {

    return base_url($uri);
}

//to generate an image tag, set tag to true. you can also put a string in tag to generate the alt tag
function theme_img($uri, $tag = false, $style = '') {
    if ($tag) {
        return '<img src="' . theme_url('assets/img/' . $uri) . '" alt="' . $tag . '"  style="' . $style . '" >';
    } else {
        return theme_url('assets/img/' . $uri);
    }
}

function theme_img2($uri, $tag = false) {
    if ($tag) {
        return '<img src="' . theme_url('assets/img/' . $uri) . '" alt="' . $tag . '" width="50px" >';
    } else {
        return theme_url('assets/img/' . $uri);
    }
}

function theme_js($uri, $tag = false) {
    if ($tag) {
        return '<script type="text/javascript" src="' . theme_url('assets/js/' . $uri) . '"></script>';
    } else {
        return theme_url('assets/js/' . $uri);
    }
}

//you can fill the tag field in to spit out a link tag, setting tag to a string will fill in the media attribute
function theme_css($uri, $tag = false) {
    if ($tag) {
        $media = false;
        if (is_string($tag)) {
            $media = 'media="' . $tag . '"';
        }
        return '<link href="' . theme_url('assets/css/' . $uri) . '" type="text/css" rel="stylesheet" ' . $media . '/>';
    }

    return theme_url('assets/css/' . $uri);
}

function theme_font_awesome($uri, $tag = false) {
    if ($tag) {
        $media = false;
        if (is_string($tag)) {
            $media = 'media="' . $tag . '"';
        }
        return '<link href="' . theme_url('assets/font-awesome/' . $uri) . '" type="text/css" rel="stylesheet" ' . $media . '/>';
    }

    return theme_url('assets/css/' . $uri);
}

function verifica_segmento($tipo) {
    $segmentos = explode('/', uri_string());

    if (isset($segmentos[1])) {

        switch ($tipo) {
            case 'my_account':
                if ($segmentos[1] == 'my_account') {
                    return true;
                }
                break;
            case 'orders':
                if ($segmentos[1] == 'customer_orders' || $segmentos[1] == 'view_order' || $segmentos[1] == 'crea_factura') {
                    return true;
                }
                break;
            case 'upgrade':
                if ($segmentos[1] == 'upgrade') {
                    return true;
                }
                break;
            case 'returns':
                if ($segmentos[1] == 'returns') {
                    return true;
                }
                break;
            case 'purse':
                if ($segmentos[1] == 'purse') {
                    return true;
                }
                break;
            case 'address_book':
                if ($segmentos[1] == 'address_book') {
                    return true;
                }
                break;

            default:
                break;
        }
    }

    return false;
}

function format_currency($value, $symbol = true) {
    $fmt = numfmt_create('es_MX', NumberFormatter::CURRENCY);
    return numfmt_format_currency($fmt, $value, 'MXN');
}

function drop_str($str, $length = 90) {
    if (strlen($str) <= $length) {
        return $str;
    }
    return substr($str, 0, ($length - 3)) . '...';
}

function getGeometry($address) {

    $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=" . urlencode($address) . "&sensor=false");
    $json = json_decode($json);
    if (!$json || $json->status != 'OK') {
        return false;
    }

    return $json->results[0]->geometry->location;
}

function sendMail($email, $subject, $message) {
    $CI = & get_instance();

    $CI->load->library('email');

    $config = [
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'priority' => 1,
    ];
//    $config = [
//        'protocol' => 'smtp',
//        'smtp_host' => 'mail.sumawebdesarrollo.com',
//        'smtp_user' => '-',
//        'smtp_pass' => '-',
//        'mailtype' => 'html',
//        'charset' => 'utf-8',
//        'priority' => 1,
//    ];
    $CI->email->initialize($config);
    $CI->email->from('adogtion.software@sumawebdesarrollo.com', 'aDOGtion Software');
    $CI->email->to($email);

    $CI->email->subject($subject);
    $CI->email->message($message);
    return $CI->email->send();
}

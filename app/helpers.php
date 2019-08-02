<?php

if (! function_exists('page_title')){
    function page_title($title) {
        $base_title = 'Transition 2030 - Le site';
        if($title === '') {
            return $base_title;
        } else {
            return $title . ' | ' . $base_title;
        }
    }
}
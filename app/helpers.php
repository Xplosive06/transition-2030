<?php

if (!function_exists('page_title')) {
    function page_title($title)
    {
        $base_title = config('app.name') . ' - Le site';

        return empty($title) ? $base_title : $title . ' | ' . $base_title;
    }
}

if (!function_exists('set_active_route')) {
    function set_active_route($route)
    {
        return Route::is($route) ? 'active' : '';
    }
}

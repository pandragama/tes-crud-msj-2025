<?php

if (!function_exists('status_decode')) {
    function status_decode($key)
    {
        $statuses = [
            'cont' => 'Contract',
            'emp' => 'Employee',
            'not_act' => 'Not Active',
        ];

        return $statuses[$key] ?? '-';
    }
}
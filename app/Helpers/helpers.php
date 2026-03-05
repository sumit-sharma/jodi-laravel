<?php

use App\Models\ProfileBio;
use App\Models\User;
use App\Traits\CommonTrait;

if (!function_exists('fetchCustomerByrno')) {
    function fetchCustomerByrno($rno)
    {
        return ProfileBio::where('rno', $rno)->first();
    }
}

if (!function_exists('fetchUserByUsername')) {
    function fetchUserByUsername($username)
    {
        return User::where('username', $username)->first();
    }
}

if (!function_exists('convertCommonDate')) {
    function convertCommonDate($dateString, $format = 'M d, Y')
    {
        return CommonTrait::convertCommonDate($dateString, $format);
    }
}

if (!function_exists('rs_label')) {
    function rs_label($rs)
    {
        return match ($rs) {
            '1' => "Indian Citizen",
            '2' => "Temp. Residing Abroad",
            '3' => "Non Resident Indian",
            default => "",
        };
    }
}

if (!function_exists('ms_label')) {
    function ms_label($ms)
    {
        return match ($ms) {
            '1' => "Never Married",
            '2' => "Divorced",
            '3' => "Widowed",
            '4' => "Separated",
            default => "",
        };
    }
}

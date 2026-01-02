<?php

use App\Models\ProfileBio;
use App\Traits\CommonTrait;

if (!function_exists('fetchCustomerByrno')) {
    function fetchCustomerByrno($rno)
    {
        return ProfileBio::where('rno', $rno)->first();
    }
}

if (!function_exists('convertCommonDate')) {
    function convertCommonDate($dateString, $format = 'M d, Y')
    {
        return CommonTrait::convertCommonDate($dateString, $format);
    }
}

<?php

use App\Models\ProfileBio;

if (!function_exists('fetchCustomerByrno')) {
    function fetchCustomerByrno($rno)
    {
        return ProfileBio::where('rno', $rno)->first();
    }
}

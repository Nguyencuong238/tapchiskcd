<?php

function settings($key = null, $default = null)
{
    if ($key === null) {
        return app(App\Settings::class);
    }

    return app(App\Settings::class)->get($key, $default);
}

function formatDate($date) {
    return $date->setTimezone('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
}

if (! function_exists('asset_v')) {
    function asset_v($url)
    {
        if (config('app.env') === 'local') {
            $version = uniqid();
        } else {
            $version = config('app.asset_version', 1);
        }
        $version = uniqid();

        return asset($url).'?v='.$version;
    }
}

if (! function_exists('getListFeature')) {
    function getListFeature($feature = null)
    {
        $features = [
            1 => 'Free WiFi',
            2 => 'Free Parking',
            3 => 'Pet Friendly',
            4 => 'Online Ordering',
            5 => 'Group Visits',
            6 => 'Air Conditioned'
        ];

        if ($feature) {
            return $features[$feature];
        }

        return $features;
    }
}

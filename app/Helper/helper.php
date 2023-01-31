<?php

if (!function_exists('assetStorage')) {
    function assetStorageAvatar($path)
    {
        return asset('storage/' . $path ?? config('default.avatar'));
    }
}


if (!function_exists('assetStorage')) {
    function assetStorage($path)
    {
        return asset('storage/' . $path ?? config('default.image.course_detail'));
    }
}

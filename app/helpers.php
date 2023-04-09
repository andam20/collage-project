<?php

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

if (!function_exists("getFile")) {
    //make title singuler
    function getFile($model,$name=null)
    {
        return $model->getFirstMedia($name) ? asset($model->getFirstMedia($name)->getUrl()) : URL::asset('/assets/images/place_holder.jpg');
    }
}

if (!function_exists("getThumb")) {
    //make title singuler
    function getThumb($model,$name=null)
    {
        return $model->getFirstMedia($name) ? asset($model->getFirstMediaUrl($name, 'thumb')) : URL::asset('images/placeholder.svg');
    }
}

if (!function_exists("formatDate")) {
    //make title singuler
    function formatDate($date)
    {
        return Carbon::parse($date)->format("F d, Y - h:i a");
    }
}

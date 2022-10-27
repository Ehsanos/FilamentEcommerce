<?php

use App\Models\Setting;

function lang($name){
    $lang=\App\Models\Lang::whereWord($name)->first();
    if($lang){
        return $lang->{app()->getLocale()};
    }
    return  "";
}

function setting(){
    return Setting::first();

}

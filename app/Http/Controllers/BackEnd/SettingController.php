<?php

namespace App\Http\Controllers\BackEnd;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    //

    public function getSettings(){
        $settings = Setting::adminSettingPage();
        return view("admincp.backend.settings",['settings'=> $settings]);
    }
    public function insertSetting(Request $request){
        return view("admincp.backend.setting.add");
    }
    public function doInsertSetting(Request $request){
        $name = $request['name'];
        $slug = isset($request['slug'])?$request['slug']:str_slug($request['name']);
        $value = $request['value'];

        $setting = new Setting();
        $setting->name = $name;
        $setting->slug = $slug;
        $setting->value = $value;
        $setting->save();
        return redirect(route("admincp.admin.setting.get"));
    }
}

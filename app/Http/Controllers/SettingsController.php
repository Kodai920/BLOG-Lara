<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Http\Requests\UpdateSettingsRequest;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function index(){
        $settings = Settings::first();
        return view('settings.index')->with('settings',$settings);
    }

    public function update(UpdateSettingsRequest $request){
        $settings = Settings::first();

        $settings->fill($request->input())->save();

        Session::flash('success','Settings Updated Successfully');
        return redirect()->route('settings.index');
    }
}
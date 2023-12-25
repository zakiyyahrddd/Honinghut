<?php

namespace App\Http\View\Composers;

use App\Models\Setting;
use App\Models\Sosmed;
use Illuminate\View\View;

class SettingComposer
{
    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $view->with([
            'setting' => Setting::pluck('value', 'key'),
			//pluck ini adalah array dari setting controller sing dipanggil ndek sini utk mengelola elemen elemen yg di view di setting
			//iki elemen arrayne onok ndek settingcontroller
        ]);
    }
}

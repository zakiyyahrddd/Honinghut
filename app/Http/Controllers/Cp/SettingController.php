<?php

namespace App\Http\Controllers\Cp;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            checkPermission($this->user, 'settings');
            return $next($request);
        });
    }

    public function index()
    {
        return view('cp.setting.edit', [
            'setting' => Setting::pluck('value', 'key'),
            'user' => user()
        ]);
    }
    public function edit()
    {
        return view('cp.setting.edit', [
            'setting' => Setting::pluck('value', 'key')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'setting.logo' => 'image'
        ], [
            'setting.logo.image' => 'Logo website must be an image.'
        ]);
        $this->validate($request, [
            'setting.icon' => 'image'
        ], [
            'setting.icon.image' => 'Icon website must be an image.'
        ]);
         // $this->validate($request, [
        //     'setting.banner' => 'image'
        // ], [
        //     'setting.banner.image' => 'Gambar Banner must be an image.'
        // ]);

        collect($request->setting)
            ->each(function ($value, $key) use ($request) {
                if ($key == 'logo') {
                    if ($request->hasFile('setting.logo')) {
                        $setting = Setting::where('key', $key)->firstOrFail();
                        removeFile($setting->value);
                        $file = $request->file('setting.logo');
                        $value = $file->move('files/', generateFileName('logo', $file));
                    }
                }
                if ($key == 'icon') {
                    if ($request->hasFile('setting.icon')) {
                        $setting = Setting::where('key', $key)->firstOrFail();
                        removeFile($setting->value);
                        $file = $request->file('setting.icon');
                        $value = $file->move('files/', generateFileName('icon', $file));
                    }
                }
                // if ($key == 'banner') {
                //     if ($request->hasFile('setting.banner')) {
                //         $setting = Setting::where('key', $key)->firstOrFail();
                //         removeFile($setting->value);
                //         $file = $request->file('setting.banner');
                //         $value = $file->move('files/', generateFileName('banner', $file));
                //     }
                // }

                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value],
                );
            });

        return redirect(route('cp.settings.index'))
            ->with('success', 'Setting saved.');
    }
}

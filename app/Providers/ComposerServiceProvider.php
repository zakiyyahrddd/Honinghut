<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            [
                'layouts.base',
                'layouts.cp',
                'layouts.auth',
                'layouts.site',
                'auth.login',
                'auth.passwords.email',
                'auth.passwords.reset',
                'cp.registrant.form',
                'components.sidepanel',
				'contact-us',
                'contact',
				'layouts.banner'
            ],
            'App\Http\View\Composers\SettingComposer'
        );
        view()->composer(
            [
                'components.sidepanel',
            ],
            'App\Http\View\Composers\GalleryComposer'
        );
        view()->composer(
            [
                'components.sidepanel',
            ],
            'App\Http\View\Composers\AnnouncementComposer'
        );
        view()->composer(
            [
                'layouts.site',
            ],
            'App\Http\View\Composers\MenuComposer'
        );
        view()->composer(
            [
                'home',
            ],
            'App\Http\View\Composers\HomeComposer'
        );
        view()->composer(
            [
                'detail',
            ],
            'App\Http\View\Composers\NewsComposer'
        );
    }
}

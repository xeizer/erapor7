<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('path.public', function () {
        //     return base_path('/../rapor.smkn7ptk.sch.id');
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //untuk ropor diserver gunakanini
        // $this->app->bind('path.public', function () {
        //     return base_path('/../public_html');
        // });
        $url = parse_url(url('/'));
        if ($url['scheme'] == 'https') {
            URL::forceScheme('https');
        }
        Carbon::setLocale(LC_TIME, $this->app->getLocale());
    }
}

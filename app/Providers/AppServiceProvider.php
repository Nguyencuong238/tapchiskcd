<?php

namespace App\Providers;

use App\Settings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Settings::class, function () {
            return Settings::make(storage_path('app/settings.json'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Model::unguard();
        Relation::enforceMorphMap([
            'blog'    => 'App\Models\Blog',
            'post'    => 'App\Models\Post',
            'page'    => 'App\Models\Page',
            'user'    => 'App\Models\User',
            'tempo'   => 'Spatie\MediaLibraryPro\Models\TemporaryUpload',
            'banner'  => 'App\Models\Banner',
            'video'   => 'App\Models\Video',
            'project' => 'App\Models\Project',
            'album'   => 'App\Models\Album',
            'event'   => 'App\Models\Event',
            'document'   => 'App\Models\Document',
            'official_dispatch'   => 'App\Models\OfficialDispatch',
        ]);

        if (! Str::hasMacro('shortNumber')) {
            Str::macro('shortNumber', function (int $number, int $decimals = 1) {
                if ($number < 1_000) {
                    $format = number_format($number, $decimals);
                    $suffix = '';
                } elseif ($number < 1_000_000) {
                    $format = number_format(floor($number / 100) / 10, $decimals);
                    $suffix = 'K';
                } elseif ($number < 1_000_000_000) {
                    $format = number_format(floor($number / 100000) / 10, $decimals);
                    $suffix = 'M';
                } else {
                    return "🤯";
                }

                if ($decimals > 0) {
                    $dotzero = '.' . str_repeat('0', $decimals);
                    $format = str_replace($dotzero, '', $format);
                }

                return $format . $suffix;
            });
        }
    }
}

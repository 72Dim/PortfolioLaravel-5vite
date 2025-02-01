<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\Facades\URL;
use App\Models\Product;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    private $segmentsUrl = 'storage/thumbnail/';
    private $thumbnail = [
        'pear'       => 'https://cdn-icons-png.flaticon.com/128/8323/8323780.png',
        'brandImage' => 'https://cdn-icons-png.flaticon.com/128/982/982997.png',
        'nameBranch' => 'https://cdn-icons-png.flaticon.com/128/982/982997.png',
        'penRegister' => 'https://cdn-icons-png.flaticon.com/128/4776/4776615.png',
        'laravelbook' => 'https://kupichitay.com.ua/wp-content/uploads/2020/03/u_files_store_3_2336915.jpg',
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->share([
            // 'siteFavicon' => URL::asset($this->segmentsUrl.$this->thumbnail['pear']),
            'siteFavicon' => $this->thumbnail['pear'],
            'brandImage'  => $this->thumbnail['brandImage'],
            'nameBranch'  => $this->thumbnail['nameBranch'],
            'penRegister' => $this->thumbnail['penRegister'],
            'laravelBook' => $this->thumbnail['laravelbook'],
        ]);

        Gate::define('show_products', function ($user, $products) {
            return ($user->name == 'Dany') ? true : false;
        });
    }
}

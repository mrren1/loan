<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $news=DB::table('news')->where('is_read',0)->get();
        $newsNum=0;
        if($news!=''){
            $news=$news->toArray();
            $newscount=count($news);
        }
        view()->share(['news'=>$news,'newscount'=>$newscount]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

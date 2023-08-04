<?php

namespace App\Providers;

use App\Data\Foo;
use App\Data\Bar;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class FooBarServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        echo "FooBarsServiceProvider";
        
        $this->app->singleton(Foo::class,function($app){
            return new Foo();
        });

        $this->app->singleton(Bar::class,function ($app){
            return new Bar($app->make(Foo::class));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function provides(){
        return [HelloService::class,Foo::class,Bar::class];
    }
}

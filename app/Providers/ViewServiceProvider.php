<?php namespace JLcourier\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->app->make('view')->composer(
            'ordenes/create',
            'JLcourier\Http\ViewComposers\MakeModelForm'
        );
        
        $this->app->make('view')->composer(
            'ordenes/update',
            'JLcourier\Http\ViewComposers\MakeModelForm'
        );
        
        $this->app->make('view')->composer(
            'cotizaciones/create',
            'JLcourier\Http\ViewComposers\MakeCotizacionForm'
        );
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}

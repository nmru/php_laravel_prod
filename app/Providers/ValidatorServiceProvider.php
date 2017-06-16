<?php

namespace produccion\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use produccion\Device;
use DB;




class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('limited_space', function($attribute, $value, $parameters)
          {
             
             $lote = Input::get('L');

             $result = true;

             $c = DB::table('proceso')
                      ->where('Lote','LIKE' ,'%'.$lote.'%')
                      ->count();

             if ($c >= 20)
                {
                    $result =false;

                }
        
            return $result;
            
          });
        //
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

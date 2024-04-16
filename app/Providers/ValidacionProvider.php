<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidacionProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Expresion regular para el correo
        Validator::extend('email_validation', function ($attribute, $value, $parameters, $validator) {

            return preg_match('/^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/', $value);

        });


        // Expresion regular para nombre y apellido
        Validator::extend('name_validation', function ($attribute, $value, $parameters, $validator) {

            return preg_match('/^[a-zA-ZñÑ\s]+$/', $value);

        });


        // Expresion regular para validar la password
        Validator::extend('password_validation', function ($attribute, $value, $parameters, $validator) {

            return preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/', $value);

        });

    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    /**
     * emails validator extension
     * Validates one or multiple emails in comma separated string.
     */
        \Validator::extend('comma_emails', function ($attribute, $value, $parameters, $validator) {
            $emails = preg_split('/,\s*/', $value);
            foreach ($emails as $email) {
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        return false;
                }
            }
            return true;
        }, 'The :attribute must be comma separated valid email addresses.');
    }
}

<?php

namespace App\Providers;

use App\Models\User;
use App\Models\UserNotification;
use App\Services\EmailNotificationService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;

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
        UserNotification::created(function (UserNotification $notification) {
            app(EmailNotificationService::class)->send($notification);
        });

        ResetPassword::createUrlUsing(function (User $user, string $token) {
            return url('/?reset_token=' . urlencode($token) . '&email=' . urlencode($user->email));
        });
    }
}

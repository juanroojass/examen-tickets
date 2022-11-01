<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LogoutResponse;
use Illuminate\Routing\Pipeline;

use Laravel\Fortify\Actions\AttemptToAuthenticate;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Features;
use App\Providers\RouteServiceProvider;

use App\Http\Responses\LoginResponse;
use Laravel\Fortify\Http\Responses\FailedTwoFactorLoginResponse as FailedTwoFactorLoginResponseContract;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //test
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);        

        Fortify::loginView(function () {
            return view('auth.login');
        });   
        Fortify::registerView(function () {
            return view('auth.register');
        });
        Fortify::confirmPasswordView(function () {
            return view('auth.passwords.confirm');
        });   
        Fortify::twoFactorChallengeView(function () {
            return view('auth.two-factor-challenge');
        }); 

        $this->app->singleton(FailedTwoFactorLoginResponseContract::class, LoginResponse::class);

    }
}

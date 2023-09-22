<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Contracts\TwoFactorLoginResponse as TwoFactorLoginResponseContract;
use App\Http\Responses\LoginResponse;
use App\Http\Responses\TwoFactorLoginResponse;

use Session;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->registerResponseBindings();
    }

     /**
     * Register the response bindings.
     *
     * @return void
     */
    protected function registerResponseBindings()
    {
        $this->app->singleton(LoginResponseContract::class, LoginResponse::class);
        $this->app->singleton(TwoFactorLoginResponseContract::class, TwoFactorLoginResponse::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Fortify::createUsersUsing(CreateNewUser::class);
        // Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        // Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        // Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // Add custom login with nip
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('nip', $request->username)
            ->orWhere('email', $request->username)
            ->first();

            if ($user &&
                Hash::check($request->password, $user->password)) {

                if($user->status === 'active')
                {
                    return $user;
                }
                Session::flash('warning', 'Oops! Maaf, akun anda telah di blokir/ tidak aktif. Untuk info lebih lanjut, silahkan hubungi pengelola website.');
                return false;
            }
            Session::flash('danger', 'Oops! Data tidak valid, pastikan username dan password yang di input sudah benar.');
            return false;
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->username;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // Login Users
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // Lupa Password
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot');
        });

        // Reset Password
        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset', ['request' => $request]);
        });
    }
}

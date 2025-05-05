<?php

namespace App\Providers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
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
        //
        // Gate::define('edit-student', function (User $user, Student $student) {
        //     return $user->id === $student->user_id;
        // });

        Gate::define('teachers', function (User $user) {
            return $user->user_type === 'teacher';
        });

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verify Your Email Address')
                ->view('emails.verify-email', compact('url'));
        });
    }
}

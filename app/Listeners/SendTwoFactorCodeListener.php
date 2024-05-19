<?php

namespace App\Listeners;
use App\Notifications\SendOTP;
use Laravel\Fortify\Events\TwoFactorAuthenticationChallenged;
use Laravel\Fortify\Events\TwoFactorAuthenticationEnabled;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTwoFactorCodeListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

//    /**
//     * Handle the event.
//     *
//     * @param  object  $event
//     * @return void
//     */
//    public function handle(TwoFactorAuthenticationChallenged|TwoFactorAuthenticationEnabled $event): void {
//        $event->user->notify(app(SendOTP::class));
//    }

    /**
     * @param TwoFactorAuthenticationChallenged|TwoFactorAuthenticationEnabled $event
     */
    public function handle($event): void {
        $event->user->notify(app(SendOTP::class));
    }

}

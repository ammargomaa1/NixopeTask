<?php

namespace App\Listeners;

use App\Events\UserAdded;
use App\Jobs\SendMailJob;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMail
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

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserAdded  $event
     * @return void
     */
    public function handle(UserAdded $event)
    {
        dispatch(new SendMailJob($event->user));
    }
}

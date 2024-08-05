<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Request;
use Spatie\Activitylog\Models\Activity;

class LogSuccessfulLogin
{
    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $ipAddress = Request::ip();
        activity()
            ->causedBy($event->user)
            ->performedOn($event->user)
            ->withProperties(["old" => ['event' => 'Login', 'Ip Address' => $ipAddress]])
            ->log('User logged in');
    }
}

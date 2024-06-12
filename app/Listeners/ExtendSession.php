<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ExtendSession
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(object $event): void
    {
        if (Auth::check()) {
            Session::put('last_activity', time());
        }
    }
}
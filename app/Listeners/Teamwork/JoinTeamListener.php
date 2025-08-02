<?php

namespace App\Listeners\Teamwork;

use Teamwork;

class JoinTeamListener
{
    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        if (session('invite_token')) {
            if ($invite = Teamwork::getInviteFromAcceptToken(session('invite_token'))) {
                Teamwork::acceptInvite($invite);
            }
            session()->forget('invite_token');
        }
    }
}

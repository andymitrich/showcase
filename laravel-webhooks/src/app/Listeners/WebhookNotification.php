<?php

namespace App\Listeners;

use App\Events\WebhookEvent;
use App\Notifications\SlackNotification;

class WebhookNotification
{
    /**
     * Handle the event.
     * @param  WebhookEvent  $event
     * @return void
     */
    public function handle(WebhookEvent $event)
    {
        $event->notify(new SlackNotification($event));
    }
}

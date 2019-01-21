<?php

namespace App\Notifications;

use App\IEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class SlackNotification extends Notification
{
    use Queueable;

    /**
     * @var \Illuminate\Config\Repository|string
     */
    private $channel;

    /**
     * @var \Illuminate\Config\Repository|string
     */
    private $username;

    /**
     * @var IEvent
     */
    private $event;

    /**
     * SlackNotification constructor.
     * @param $event
     */
    public function __construct(IEvent $event)
    {
        $this->event = $event;
        $this->channel = config('services.slack.channel');
        $this->username = config('services.slack.username');
    }

    /**
     * @param Notification $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * @param Notification $notifiable
     * @return SlackMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->to("#{$this->channel}")
            ->from($this->username, $icon = ':ghost:')
            ->content($this->event->getContent());
    }
}

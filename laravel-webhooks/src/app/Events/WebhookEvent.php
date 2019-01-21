<?php

namespace App\Events;

use App\IEvent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Queue\SerializesModels;

class WebhookEvent implements IEvent
{
    use SerializesModels, Notifiable;

    /**
     * @var \Illuminate\Config\Repository|string
     */
    private $url;

    /**
     * @var string
     */
    private $project;

    /**
     * @var string
     */
    private $eventType;

    /**
     * @param string $project
     * @param string $eventType
     */
    public function __construct($project, $eventType)
    {
        $this->url = config('services.slack.url');
        $this->project = $project;
        $this->eventType = $eventType;
    }

    /**
     * @return \Illuminate\Config\Repository|string
     */
    public function routeNotificationForSlack()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->project . ':' . $this->eventType;
    }
}

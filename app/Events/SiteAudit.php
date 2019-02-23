<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SiteAudit
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $siteId;

    /**
     * SiteAudit constructor.
     *
     * @param $siteId
     */
    public function __construct($siteId)
    {
        $this->siteId = $siteId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

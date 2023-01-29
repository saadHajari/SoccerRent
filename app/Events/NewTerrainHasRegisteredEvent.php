<?php
namespace App\Events;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class NewTerrainHasRegisteredEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $terrain;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($terrain)
    {
        $this->terrain = $terrain;
    }
}
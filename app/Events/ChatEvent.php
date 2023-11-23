<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    private mixed $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('chat-channel'),
        ];
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */

    public function broadcastAs(): string
    {
        $event_id = empty($this->message->receiver_id) ? $this->message->sender_id : $this->message->receiver_id;
        return 'chat-event-' . $event_id;
    }

    public function broadcastWith(): array
    {
        return [
            'message' => $this->message,
        ];
    }
}

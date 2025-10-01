<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;

class MessageSent2 implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $sender;
    public $receiver;
    public $message;
    public $conversation;

    /**
     * Create a new event instance.
     */
    public function __construct(Doctor $sender, Patient $receiver, Message $message, Conversation $conversation)
    {
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->message = $message;
        $this->conversation = $conversation;
    }

    public function broadcastWith(): array
    {
        return [
            'sender_email' => $this->sender->email,
            'receiver_email' => $this->receiver->email,
            // 'body' => $this->message->body,
            'message' => $this->message->id,
            'conversation_id' => $this->conversation->id,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chat2.'.$this->receiver->id),
        ];
    }
}

<?php

namespace App\Events;

use App\Models\Inquiry;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewInquiryEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Inquiry $inquiry;

    public function __construct(Inquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    public function broadcastOn(): Channel
    {
        return new Channel('admin-notifications');
    }

    public function broadcastAs(): string
    {
        return 'new-inquiry';
    }

    public function broadcastWith(): array
    {
        return [
            'type' => 'inquiry',
            'title' => 'New Inquiry Received',
            'message' => "You have a new inquiry from {$this->inquiry->name}.",
            'data' => $this->inquiry->toArray(),
        ];
    }
}

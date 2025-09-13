<?php

namespace App\Events;

use App\Models\Patient;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateInvoice implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public $patient;
    public $invoice_id;
    public $message;
    public $created_at;
    public $doctor_id;

    public function __construct($data)
    {
        $patient = Patient::find($data['patient_id']);
        $this->patient = $patient->name;
        $this->invoice_id = $data['invoice_id'];
        $this->doctor_id = $data['doctor_id'];
        $this->message = 'كشف جديد :';
        $this->created_at = date('Y-m-d H:i:s');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('create-invoice'.$this->doctor_id),
        ];
    }

    public function broadcastAs()
    {
        return 'create-invoice';
    }
}

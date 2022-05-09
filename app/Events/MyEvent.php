<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class MyEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $message;

  public function __construct($message, $user_Id)
  {
      $this->message['text'] = $message;
      $this->message['user_id'] = $user_Id;
  }

  public function broadcastOn()
  {
      //return ['my-channel'];
      return new PrivateChannel('mychannel' . $this->message['user_id']);
  }

  public function broadcastAs()
  {
      return 'MyEvent';
  }
}

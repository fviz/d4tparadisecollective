<?php

namespace App\Models;

use App\Notifications\TicketReserved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ticket extends Model
{
    use HasFactory;
    use Notifiable;

    public function notifyDiscord() {
        $this->notify(new TicketReserved($this));
    }

    public function routeNotificationForDiscord()
    {
        return $this->channel_id;
    }
}

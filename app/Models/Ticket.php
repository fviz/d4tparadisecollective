<?php

namespace App\Models;

use App\Mail\TicketsReserved;
use App\Notifications\TicketReserved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class Ticket extends Model
{
    use HasFactory;
    use Notifiable;

    public function notifyEmail() {
        Mail::to($this->client_email)->send(new TicketsReserved($this));
    }

    public function routeNotificationForDiscord()
    {
        return $this->channel_id;
    }
}

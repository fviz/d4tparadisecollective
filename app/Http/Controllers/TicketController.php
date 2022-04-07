<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Ticket;
use App\Notifications\TicketReserved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class TicketController extends Controller
{
    public function __construct() {
        \Stripe\Stripe::setApiKey(env('STRIPE_SK_KEY'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreTicketRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateTicketRequest $request
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    public function get_tickets(Request $request)
    {

        $client_email = $request->email;
        $amount_of_tickets = $request->amount;
        $price_per_ticket = floatval(str_replace(',', '.', $request->price));

        $new_ticket = new Ticket();
        $new_ticket->client_email = $client_email;
        $new_ticket->amount = $amount_of_tickets;
        $new_ticket->price = $price_per_ticket;
        $new_ticket->uuid = \Ramsey\Uuid\Uuid::uuid4();
        $new_ticket->status = 'processing_payment';


        if ($request->payment_choice == 'free' || $price_per_ticket == 0) {
            if (is_null($new_ticket->price)) {
                $new_ticket->price = 0;
            }
            $new_ticket->save();
            return redirect()->to(URL::to('/') . "/tickets_success?uuid=" . $new_ticket->uuid);
        } else {
            $new_ticket->save();
        }

        \Stripe\Stripe::setApiKey(env("STRIPE_SK_KEY"));

        $session = \Stripe\Checkout\Session::create([
            'customer_email' => $client_email,
            'metadata' => [
                "uuid" => $new_ticket->uuid
            ],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => 'Launch Party Tickets',
                    ],
                    'unit_amount' => $price_per_ticket * 100,
                ],
                'quantity' => $amount_of_tickets,
            ]],
            'mode' => 'payment',
            'success_url' => URL::to('/') . "/tickets_success?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => URL::to('/') . "/tickets_cancel",
        ]);

        return redirect($session->url, 303);


    }

    public function tickets_success(Request $request) {
        $uuid = $request->uuid;

        if (is_null($uuid)) {
            $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));
            $uuid = $session->metadata["uuid"];
        }

        $found_ticket = Ticket::where('uuid', $uuid)->firstOrFail();
        if ($found_ticket->status == 'completed') {
            return view('tickets_success')->with(["ticket" => $found_ticket]);
        } else {
            Log::info("Confirming ticket:");
            Log::info($found_ticket);
            $found_ticket->status = 'completed';
            $found_ticket->save();
            if (env("DISCORD_ENABLED")) {
                $found_ticket->notify(new TicketReserved($found_ticket));
            }
            $found_ticket->notifyEmail();
        }
        return view('tickets_success')->with(["ticket" => $found_ticket]);
    }
}

<?php

namespace App\Exports;

use App\Models\Ticket;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TicketsExport implements FromView
{
    protected $tickets;

    public function __construct($tickets)
    {
        $this->tickets = $tickets;
    }

    public function view(): View
    {
        return view('exports.tickets', ['tickets' => $this->tickets]);
    }
}
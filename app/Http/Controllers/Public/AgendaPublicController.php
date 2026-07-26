<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Agenda;

class AgendaPublicController extends Controller
{
    public function index()
    {
        $agendas = Agenda::orderBy('event_date', 'desc')->paginate(9);
        return view('public.agenda.index', compact('agendas'));
    }
}

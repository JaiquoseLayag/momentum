<?php

namespace App\Http\Controllers;

use App\Models\FocusSession;

class FocusHistoryController extends Controller
{
    public function index()
    {
        $sessions = FocusSession::with('task')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('focus.history', compact('sessions'));
    }
}
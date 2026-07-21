<?php

namespace App\Http\Controllers;

class FocusController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()
            ->tasks()
            ->where('status', 'pending')
            ->get();

        return view('focus.index', compact('tasks'));
    }
}
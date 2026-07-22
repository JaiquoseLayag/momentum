<?php

namespace App\Http\Controllers;

use App\Models\FocusSession;
use Illuminate\Http\Request;

class FocusSessionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([

            'task_id' => 'required|exists:tasks,id',

            'duration' => 'required|integer|min:1',

            'started_at' => 'required|date',

            'completed_at' => 'required|date',

        ]);


        auth()->user()->focusSessions()->create([

            'task_id' => $validated['task_id'],

            'duration' => $validated['duration'],

            'started_at' => $validated['started_at'],

            'completed_at' => $validated['completed_at'],

        ]);


        return response()->json([
            'success' => true
        ]);
    }
}
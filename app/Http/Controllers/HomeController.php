<?php

namespace App\Http\Controllers;

use App\Models\Companion;
use App\Models\Participant;
use App\Models\Slot;
use Illuminate\Http\Request;
use App\Models\ParticipantClockIn;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $slot = Slot::where('id', 1)->first();
        $search = $request->input('search');

        $participants = Participant::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->appends(['search' => $search]);
        
        $total = Participant::count() + Companion::count();

        return view('dashboard.index', compact('participants', 'search', 'total' , 'slot'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $participants = Participant::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json([
            'table' => view('dashboard.partials.participants-table', compact('participants'))->render(),
        ]);
    }

    public function countStats()
    {
        $scannedCount = ParticipantClockIn::count();
        $notScannedCount = Participant::count() - $scannedCount;

        return response()->json([
            'scanned' => $scannedCount,
            'notScanned' => $notScannedCount
        ]);
    }
}
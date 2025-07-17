<?php

namespace App\Http\Controllers;

use App\Models\Companion;
use App\Models\Participant;
use App\Models\Slot;
use Illuminate\Http\Request;

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
}

<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $participants = Participant::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->appends(['search' => $search]);
        
        $total = Participant::count();

        return view('dashboard.index', compact('participants', 'search', 'total'));
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

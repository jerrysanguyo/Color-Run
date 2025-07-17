<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlotRequest;
use App\Models\Slot;
use App\Services\SlotServices;
use Illuminate\Support\Facades\Auth;

class SlotController extends Controller
{
    protected $slotServices;

    public function __construct(SlotServices $slotServices)
    {
        $this->slotServices = $slotServices;
    }
    public function store(SlotRequest $request)
    {
        $this->slotServices->storeSlot($request->validated());

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.dashboard')
            ->with('success', 'You have successfully saved the maximum slot!');
    }
}

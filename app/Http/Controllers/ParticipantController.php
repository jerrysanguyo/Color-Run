<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateQrRequest;
use App\Http\Requests\ParticipantRequest;
use App\Models\Participant;
use App\Services\ParticipantServices;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    protected $participantServices;

    public function __construct(ParticipantServices $participantServices)
    {
        $this->participantServices = $participantServices;
    }

    public function index()
    {
        return view('participants.index');
    }
    
    public function store(ParticipantRequest $request)
    {
        $participant = $this->participantServices->store($request->validated());

        return redirect()
                ->route('participants.show', $participant->id)
                ->with('success', 'You have successfully registered!');
    }
    
    public function show(Participant $participant)
    {
        return view('participants.show', compact('participant'));
    }

    public function generateIndex()
    {
        return view('Participants.generateQr');
    }

    public function generateQr(GenerateQrRequest $request)
    {
        $participant = $this->participantServices->generateQr($request->validated());

        return redirect()
                ->route('participants.show', $participant->id)
                ->with('success', 'QR Code generated successfully!');
    }
}

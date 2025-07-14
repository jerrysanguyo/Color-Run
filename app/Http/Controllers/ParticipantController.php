<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateQrRequest;
use App\Http\Requests\ParticipantRequest;
use App\Http\Requests\VerifyQrRequest;
use App\Models\Participant;
use App\Models\ParticipantClockIn;
use App\Services\ParticipantServices;
use Illuminate\Support\Facades\Auth;
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
        $clockIn = ParticipantClockIn::timeInCheck($participant->id)->first();
        return view('participants.show', compact('participant', 'clockIn'));
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

    public function verifyQrIndex()
    {
        return view('participants.verifyQr');
    }

    public function verifyQr(VerifyQrRequest $request)
    {
        $participantId = $request['qr_code'];
        $participant = $this->participantServices->verifyQr($request->validated());

        if($participant === null)
        {
            return redirect()
                ->route(Auth::user()->getRoleNames()->first() . '.verifyQr.index')
                ->with('failed', 'Qr code is not registered as participant.');
        }

        if($participant === 'already_scanned')
        {
            return redirect()
                ->route('participants.show', $participantId)
                ->with('failed', 'Qr code has been scanned already.');
        }

        return redirect()
                ->route('participants.show', $participantId)
                ->with('success', 'Verification successfull!');
    }
}

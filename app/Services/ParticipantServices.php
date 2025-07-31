<?php

namespace App\Services;

use App\Jobs\EventRegisterEmail;
use App\Jobs\ParticipantClockInJob;
use App\Jobs\QrCodeGeneration;
use App\Models\Companion;
use App\Models\Participant;
use App\Models\ParticipantClockIn;
use App\Models\ParticipantQr;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\File;

class ParticipantServices
{
    public function store(array $data)
    {
        $participant = Participant::create([
            'uuid' => Str::uuid()->toString(),
            'participant_type' => $data['participant_type'],
            'name' => $data['name'],
            'age' => $data['age'],
            'sex' => $data['sex'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'shirt_size' => $data['shirt_size'],
            'kilometer' => $data['kilometer'],
        ]);

        if ($participant) {
            QrCodeGeneration::dispatch($participant);
            EventRegisterEmail::dispatch($participant);
            if (!empty($data['companion_name'])) {
                Companion::create([
                    'participant_id' => $participant->id,
                    'name' => $data['companion_name'],
                ]);
            }
        }

        return $participant;
    }

    public function generateQr($data)
    {
        $participant = Participant::where('email', $data['email'])->firstOrFail();

        return $participant;
    }

    public function verifyQr($data)
    {
        $participant = Participant::where('uuid', $data['qr_code'])->first(); //qr_code uuid

        if(!$participant)
        {
            return null;
        }

        $clockInCheck = ParticipantClockIn::timeInCheck($participant->id)->exists(); // time in check needs to be the participant id for fk

        if($clockInCheck)
        {
            return 'already_scanned';
        }
        
        ParticipantClockInJob::dispatch($participant);

        return $participant;
    }
}
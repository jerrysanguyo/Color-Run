<?php

namespace App\Services;

use App\Jobs\EventRegisterEmail;
use App\Jobs\QrCodeGeneration;
use App\Models\Participant;
use App\Models\ParticipantQr;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\File;

class ParticipantServices
{
    public function store(array $data)
    {
        $participant = Participant::create([
            'name' => $data['name'],
            'age' => $data['age'],
            'sex' => $data['sex'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'shirt_size' => $data['shirt_size'],
        ]);

        if ($participant) {
            QrCodeGeneration::dispatch($participant);
            EventRegisterEmail::dispatch($participant);
        }

        return $participant;
    }

    public function generateQr($data)
    {
        $participant = Participant::where('email', $data['email'])->firstOrFail();

        return $participant;
    }
}
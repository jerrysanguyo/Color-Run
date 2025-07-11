<?php

namespace App\Services;

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
            $directory = public_path('qrCode');
            $fileName = 'qr_' . $participant->id . '_' . $participant->name . '.png';
            $filePath = $directory . '/' . $fileName;
            
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
            }
            
            $qrContent = $participant->id;
            $qrImage = QrCode::format('png')->size(200)->generate($qrContent);
            
            file_put_contents($filePath, $qrImage);
            
            ParticipantQr::create([
                'participant_id' => $participant->id,
                'qr_code' => 'qrCode/' . $fileName,
            ]);
        }

        return $participant;
    }

    public function generateQr($data)
    {
        $participant = Participant::where('email', $data['email'])->firstOrFail();

        return $participant;
    }
}
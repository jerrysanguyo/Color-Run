<?php

namespace App\Jobs;

use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\ParticipantQr;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\File;

class QrCodeGeneration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $participant;

    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }
    
    public function handle(): void
    {
        $directory = public_path('qrCode');
        $fileName = 'qr_' . $this->participant->uuid . '_' . $this->participant->name . '.png';
        $filePath = $directory . '/' . $fileName;
        
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }
        
        $qrContent = $this->participant->uuid;
        $qrImage = QrCode::format('png')->size(200)->generate($qrContent);
        
        file_put_contents($filePath, $qrImage);
        
        ParticipantQr::create([
            'participant_id' => $this->participant->id,
            'qr_code' => 'qrCode/' . $fileName,
        ]);
    }
}

<?php

namespace App\Jobs;

use App\Models\Participant;
use App\Models\ParticipantClockIn;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class ParticipantClockInJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $participant;
    
    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }
    
    public function handle(): void
    {
        ParticipantClockIn::create([
            'participant_id' => $this->participant->id,
            'scanned_by' => Auth::user()->id,
        ]);
    }
}

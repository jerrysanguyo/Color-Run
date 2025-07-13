<?php

namespace App\Jobs;

use App\Mail\ParticipantRegisteredMail;
use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EventRegisterEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $participant;
    
    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }
    
    public function handle(): void
    {
        Mail::to($this->participant->email)->send(new ParticipantRegisteredMail($this->participant));
    }
}

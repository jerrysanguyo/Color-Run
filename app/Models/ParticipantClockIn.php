<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantClockIn extends Model
{
    use HasFactory;
    protected $table = 'participant_clock_ins';
    protected $fillable = [
        'participant_id',
        'scanned_by'
    ];

    public static function timeInCheck($participant)
    {
        return self::where('participant_id', $participant);
    }

    public function scannedBy()
    {
        return $this->belongsTo(User::class, 'scanned_by');
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }
}

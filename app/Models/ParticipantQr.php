<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantQr extends Model
{
    use HasFactory;
    protected $table = 'participant_qrs';
    protected $fillable = [
        'participant_id',
        'qr_code',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class, 'participant_id');
    }
}

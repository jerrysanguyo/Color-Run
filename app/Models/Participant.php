<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $table = 'participants';
    protected $fillable = [
        'name',
        'age',
        'sex',
        'email',
        'phone',
        'shirt_size',
        'kilometer'
    ];

    public function qr()
    {
        return $this->hasOne(ParticipantQr::class, 'participant_id');
    }

    public function clockIn()
    {
        return $this->hasOne(ParticipantClockIn::class, 'participant_id');
    }

    public function companion()
    {
        return $this->hasOne(Companion::class, 'participant_id');
    }
}

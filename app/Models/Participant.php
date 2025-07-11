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
    ];

    public function qr()
    {
        return $this->hasOne(ParticipantQr::class, 'participant_id');
    }
}

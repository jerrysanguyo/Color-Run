<?php

namespace Database\Seeders;

use App\Models\Participant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Jobs\QrCodeGeneration;

class ParticipantSeeder extends Seeder
{
    public function run(): void
    {
        Participant::factory()
            ->count(10)
            ->create()
            ->each(function ($participant) {
            QrCodeGeneration::dispatch($participant);
        });
    }
}

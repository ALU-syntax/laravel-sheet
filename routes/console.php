<?php

use App\Console\Commands\SyncTimeEntries;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Artisan::command('sync:entries', function () {
//     $this->call(SyncTimeEntries::class);
// });

// Tugas sync:entries dijalankan setiap jam
// app(Schedule::class)->command('sync:entries')->hourly();
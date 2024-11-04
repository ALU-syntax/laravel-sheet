<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SyncTimeEntries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sybc:entries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will sync the new entries in the DB with the google Sheets';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}

<?php

namespace App\Console\Commands;

use App\Models\TimeEntry;
use App\Models\Variable;
use App\Services\GoogleSheet;
use Illuminate\Console\Command;

class SyncTimeEntries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:entries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will sync the new entries in the DB with the google Sheets';

    /**
     * Execute the console command.
     */
    public function handle(GoogleSheet $googleSheet)
    {
        $variable = Variable::query()->where('name', 'LastSyncedId')->first();

        $rows = TimeEntry::query()->where('id', $variable->value)->orderBy('id')->limit(1000)->get();

        if($rows->count() === 0){
            return true;
        }

        $finalData = collect();
        $lastId = 0;

        foreach($rows as $row){
            $finalData->push([
                $row->id,
                $row->username,
                $row-> project,
                $row->date,
                $row->time
            ]);

            $lastId = $row->id;
        }


        $sheetData = $googleSheet->saveDataToSheet($finalData->toArray());

        $variable->value = $lastId;
        $variable->save(); 

        return $sheetData;
    }
}

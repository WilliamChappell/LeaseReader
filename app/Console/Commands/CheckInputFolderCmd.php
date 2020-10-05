<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\CheckInputFolderJob;

class CheckInputFolderCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'InputFolder:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks the input folder for any new documents';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        CheckInputFolderJob::dispatch();
    }
}

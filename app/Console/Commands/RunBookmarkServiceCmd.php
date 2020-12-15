<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Service\BookmarkService;

class RunBookmarkServiceCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Bookmark:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the test bookmark service';

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
        BookmarkService::BookmarkDocument("testlease.pdf");
    }
}

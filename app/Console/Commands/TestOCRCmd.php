<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Service\OCRService;
class TestOCRCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ocr:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test the OCR tool';

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
        OCRService::OCRTest();
    }
}

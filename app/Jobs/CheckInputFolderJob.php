<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Jobs\OCRJob;
use Log;

class CheckInputFolderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public function handle()
    {
        $it = new \RecursiveDirectoryIterator(config('uploads.upload_input'));

        foreach(new \RecursiveIteratorIterator($it) as $file) {
            if ($file->getExtension() == 'pdf') {
                
                $fileName = $file->getFilename();

                $currFilePath = config('uploads.upload_input') . $fileName;
                $processingFilePath = config('uploads.upload_processing') . $fileName;
                // Moves into the processing folder
                rename($currFilePath, $processingFilePath);

                // Starts a job to OCR the document
                OCRJob::dispatch($fileName)->onQueue('ocrQueue');
            }
        }

    }
}

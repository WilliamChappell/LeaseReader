<?php

namespace App\Service;
use App\Jobs\BookmarkJob;

class OCRService
{
    public static function OCRDocument($fileName)
    {
        include(config('uploads.upload_pdf_lib_location'));

        // Relative path to the folder containing the test files.
        $input_path = config('uploads.upload_processing');
        $output_path = config('uploads.upload_ocrd');

        // Needed otherwise the library will sometimes though errors about already being defined..
        sleep(5);

        \PDFNet::Initialize();
        \PDFNet::GetSystemFontList();   

        // The location of the OCR Module
        \PDFNet::AddResourceSearchPath(config('uploads.upload_pdf_ocr_location'));
        if(!\OCRModule::IsModuleAvailable()) {
            echo "Can't run OCRTest. Please check the OCR module is installed.\n";
        }else{
            $doc = new \PDFDoc($input_path.$fileName);

            $opts = new \OCROptions();

            \OCRModule::ProcessPDF($doc, $opts);

            $doc->Save($output_path.$fileName, 0);

            BookmarkJob::dispatch($fileName)->onQueue('bookmarkQueue');
        }
    }
}

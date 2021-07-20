<?php

namespace App\Service;

use App\Heading;
use Log;
class BookmarkService
{
    public static function BookmarkDocument($fileName)
    {
        include(config('uploads.upload_pdf_lib_location'));

        // Relative path to the folder containing the test files.
        $input_path = config('uploads.upload_ocrd');
        $output_path = config('uploads.upload_output');

        $headings = Heading::all();

        \PDFNet::Initialize();
        \PDFNet::GetSystemFontList();


        $doc = new \PDFDoc($input_path.$fileName);

        $textSearch = new \TextSearch();
        $mode = \TextSearch::e_highlight | \TextSearch::e_ambient_string;

        foreach($headings as $heading){

            $bookmark = \Bookmark::Create($doc, $heading->heading_name);
            $doc->AddRootBookmark($bookmark);

            foreach($heading->WordsRelation as $word){
                $textSearch->Begin($doc, $word->word, $mode);

                while(true){
                    $searchResult = $textSearch->Run();
                    if(!$searchResult->IsFound()){
                        break;
                    }

                    $curr_string = $searchResult->GetAmbientString();
                    $curr_page = $searchResult->GetPageNumber();


                    $highlights = $searchResult->getHighlights();
                    $highlights->Begin($doc);
                    while($highlights->HasNext()){
                        $currentPage = $doc->GetPage($highlights->GetCurrentPageNumber());
                        $quadsInfo = $highlights->GetCurrentQuads();

                        for ($i = 0; $i < $quadsInfo->size(); $i++)
                        {
                            $q = $quadsInfo->get($i);
                            $x1 = min(min(min($q->p1->x, $q->p2->x), $q->p3->x), $q->p4->x);
                            $x2 = max(max(max($q->p1->x, $q->p2->x), $q->p3->x), $q->p4->x);
                            $y1 = min(min(min($q->p1->y, $q->p2->y), $q->p3->y), $q->p4->y);
                            $y2 = max(max(max($q->p1->y, $q->p2->y), $q->p3->y), $q->p4->y);

                            $annot = \HighlightAnnot::Create($doc->GetSDFDoc(), new \Rect($x1, $y1, $x2, $y2));
                            $annot->SetColor(new \ColorPt(1.0,1.0,0.0), 3 );
                            $annot->SetContents($heading->heading_name);
                            $annot->RefreshAppearance();
                            $currentPage->AnnotPushBack($annot);
                        }

                        $subBookmark = $bookmark->AddChild($word->word);
                        $subBookmark->SetAction(\Action::CreateGoto(\Destination::CreateFit($currentPage)));

                        $highlights->Next();
                    }

                }


            }
        }

        // Move the file to completed
        $doc->Save($output_path.$fileName, \SDFDoc::e_linearized);
    }
}

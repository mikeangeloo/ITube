<?php

namespace ITube\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function pdfview(Request $request){
        $items = $_GET;

        view()->share('items',$items);



            $pdf = PDF::loadView('pdfview');
            return $pdf->stream('pdfview.pdf');

    }
}

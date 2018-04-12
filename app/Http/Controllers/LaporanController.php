<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Export\EventExport;
use \App\Export\DataExport;
use PDF;
use Excel;

class LaporanController extends Controller
{
    public function eventpdf(){
        $pdf = PDF::loadView('admin.event.laporan');
        return $pdf->download('event.pdf');
    }

    // public function eventexcel(){
    //     return Excel::download(new EventExport, 'namanya.xlsx');
    //   }
    public function eventexcel(){
    return Excel::download(new DataExport('\App\Event'), 'namanya.xlsx');
    }

}


<?php
    namespace App\Export;
    use Maatwebsite\Excel\Concerns\FromCollection;

    class EventExport implements FromCollection {
    public function collection()
        {
        return \App\Event::all();
        }
}
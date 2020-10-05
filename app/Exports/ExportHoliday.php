<?php

namespace App\Exports;

use App\model\hrms\employee\Holiday;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportHoliday implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $export = Holiday::ExportHolidayToExcel();
        return collect($export);
    }
}

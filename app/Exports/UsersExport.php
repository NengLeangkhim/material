<?php

namespace App\Exports;

use App\model\hrms\employee\Employee;
use App\model\hrms\Payroll\Payroll;
use App\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Mixins\DownloadCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpParser\Node\Stmt;

class UsersExport implements FromCollection, ShouldAutoSize
{
    public function __construct($month,$year)
    {
        $this->month=$month;
        $this->year=$year;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pr = new Payroll();
        $export = $pr->ExportPayroll_Excel($this->month,$this->year);
        return collect($export);
    }
}

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NotOverhaulUnitExport implements FromCollection, WithHeadings
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return [
            'Index',   //1
            'Serial machine',   //2
            'Type Code',   //3
            'Customer',   //4
            'Contract',   //5
            'Last Service',   //6
            'Hrs(Prese)',   //7
            'Hrs(TTL)',   //8
            'Last Overhaul',    //9
            'Overhaul',   //10
            'Remark',    //11
            'Services',   //12
            'User Code',    //13
            'End User',    //14
            'Country',    //15
            'Province',    //16 
            'I.E.',   //17
            'Address1',    //18
            'Address2',    //19
            'Kobelco#',    //20
            'KSL/KCMS',    //21
            'KMA#',     //22
            'Comm Date',    //23
            'C/R Date',    //24
            'Type',    //25
            'KW',     //26
            'Factory',    //27
            'Status',     //28
            'Remarks',    //29
            'created_at',    //30

            
        ];
    }
}
<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UnmaintainedMachineExport implements FromCollection, WithHeadings
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
            'Index',
            'Serial#',
            'Type Code',
            'Customer Machine#',
            'User Code',
            'End User',
            '#',
            'Date',
            'Content',
            'Performer',
            'Customer Pic',
            'Panel',
            'Run.hrs',
            'Hrs(TTL)',
            'Service',
            'Remark',
        ];
    }
}
<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerExport implements FromCollection, WithHeadings
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
            'ID',
            'User Code',
            'User Name1',
            'User Name2',
            'Country',
            'Province',
            'I.E.',
            'Zip',
            'Address1.',
            'Address2.' ,
            'Telephone.',
            'Ranking.',
            'Remarks.',
            'Created.',
            'Updated.',
        ];
    }
}
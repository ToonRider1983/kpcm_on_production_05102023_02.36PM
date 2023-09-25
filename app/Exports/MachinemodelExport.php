<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MachinemodelExport implements FromCollection, WithHeadings
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
            'Machine Type',
            'Machine Model Name	',
            'Active',
            'Country Of Origin',
            'Oil Flooded/Free',
            'Cooling Method	',
            'Inverter	',
            'Power',
            'Updated',

        ];
    }
}
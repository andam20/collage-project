<?php

namespace App\Exports;

use App\Models\CompanyProfile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CompanyProfileExport implements  FromQuery, WithHeadings, ShouldAutoSize, WithStyles,WithMapping
{
    use Exportable;

    private $query;
    private $headers;


    public function __construct($query, $headers)
    {
        $this->query = $query;
        $this->headers = $headers;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return $this->query;
    }

    // map what a single member row should look like
    // this method will iterate over each collection item
    public function map($row): array
    {
        return [
            $row->id,
            $row->name,
            $row->desc,
            $row->dob,
            $row->gender,
            $row->start_date,
            $row->salary,
            $row->phone_no,
            $row->email,
            $row->address,
            $row->password,
        ];
    }

    public function headings(): array
    {
        // return $this->headers;
        return [
            'id',
            'name',
            'description',
            'birthdate',
            'start date',
            'salary',
            'phone number',
            'email',
            'address',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => [
                'font' => ['bold' => true, "size" => '12'],
                'alignment' => ['horizontal' => 'left'],
            ]
        ];
    }
}

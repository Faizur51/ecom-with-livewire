<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class OrdersExport implements FromCollection,WithMapping,WithHeadings,WithColumnWidths
{



    public function columnWidths(): array
    {
        return [
            'A' =>5,
            'B' =>15,
            'C'=>15,
            'D'=>15,
            'E'=>15,
            'F'=>15,
            'G'=>15,
            'H'=>15,
        ];
    }



    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            'C'  => ['font' => ['size' => 18]],
        ];
    }


    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Phone',
            'City',
            'Address',
            'Total',
            'Subtotal',
        ];
    }




    public function map($order): array
    {
        return [
            $order->id,
            $order->name,
            $order->phone,
            $order->city,
            $order->address,
            $order->total,
            $order->subtotal,
        ];
    }



    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::all();
    }

}

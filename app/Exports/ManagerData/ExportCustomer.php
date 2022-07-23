<?php

namespace App\Exports\ManagerData;

use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportCustomer implements FromView,ShouldAutoSize,WithColumnWidths,WithEvents
{
    use Exportable;
    public function view(): View
    {
        $customers = Customer::all();
        return view('livewire.export.manager-data.excel.export-customer-component',compact(
            'customers'
        ));
    }

    public function columnWidths(): array
    {
         return [
             'B'=> 55,
             'C'=> 55,
             'D'=> 55,
             'E'=> 55,
             'F'=> 55,
             'G'=> 55,
             'H'=> 55,
             'I'=> 55,
             'J'=> 55,
             'K'=> 55,
             'L'=> 55,
             'M'=> 55,

         ];
    }
    public function registerEvents(): array
   {
       return [
           AfterSheet::class => function(AfterSheet $event) {
               $event
               ->sheet
               ->getDelegate()
               ->getStyle('A:M')
               ->getAlignment()
               ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
           },
       ];
   }
}

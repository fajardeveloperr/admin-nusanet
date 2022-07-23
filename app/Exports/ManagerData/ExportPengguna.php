<?php

namespace App\Exports\ManagerData;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportPengguna implements FromView,ShouldAutoSize,WithColumnWidths,WithEvents
{
    use Exportable;
    public function view(): View
    {
        $pengguna = User::all();
        return view('livewire.export.manager-data.excel.export-pengguna-component',compact(
            'pengguna'
        ));
    }

    public function columnWidths(): array
    {
         return [
             'B'=> 55,
             'C'=> 55,
             'D'=> 55,
             'E'=> 55,

         ];
    }
    public function registerEvents(): array
   {
       return [
           AfterSheet::class => function(AfterSheet $event) {
               $event
               ->sheet
               ->getDelegate()
               ->getStyle('A:E')
               ->getAlignment()
               ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
           },
       ];
   }
}

<?php

namespace App\Exports;

use App\Proposta;
use Maatwebsite\Excel\Concerns\FromCollection;

class PropostasExport implements FromCollection
{
    public function collection()
    {
        return Proposta::all();
    }
}

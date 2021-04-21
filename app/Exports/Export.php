<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class Export implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('exports.reports');
    }
}

<?php

namespace App\Exports;

use App\Models\Subject;
// use Maatwebsite\Excel\Concerns\FromQuery;
// use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SubjectExport implements FromView
{
    // use Exportable;

    public function __construct(int $major_id)
    {
        $this->major_id = $major_id;
    } 

    public function view(): View
    {
        return view('cp.export.subject', [
            'subjects' => Subject::where('major_id', $this->major_id)->get()
        ]);
    }
}

<?php

namespace App\Exports;

use App\Models\site_visits;
use App\Models\SiteVisit;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiteVisitExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $filter;

    public function __construct($filter)
    {
        $this->filter = $filter;
    }

    public function collection()
    {
        if ($this->filter == "last_ten_days") {
            return SiteVisit::query()
                ->whereDate('created_at', '>=', Carbon::now()->subDays(10))->get();
        }

        if ($this->filter == "today") {
            return SiteVisit::query()
                ->whereDate('created_at', Carbon::today())->get();
        }

        return SiteVisit::all();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SiteVisitExport;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\News;
use App\Models\SiteVisit;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('excel')) {
            $filter = $request->query('excel');

            return Excel::download(new SiteVisitExport($filter), "$filter" . "_site_visits" . ".xlsx");
        }

        $newsItems = [];
        $comments = [];

        if ($request->has('sort_news') && $request->query('sort_news') == 'asc') {
            $newsItems = News::query()
                ->orderBy('created_at')
                ->with('newsCategory')
                ->limit(10)
                ->get();
        } else {
            $newsItems = News::query()
                ->orderByDesc('created_at')
                ->with('newsCategory')
                ->limit(10)
                ->get();
        }

        if ($request->has('sort_comments') && $request->query('sort_comments') == 'asc') {
            $comments = Comment::query()
                ->whereNotNull('user_id')
                ->orderBy('created_at')
                ->limit(10)
                ->get();
        } else {
            $comments = Comment::query()
                ->whereNotNull('user_id')
                ->orderByDesc('created_at')
                ->limit(10)
                ->get();
        }

        return view('admin.dashboard', compact('newsItems', 'comments'));
    }

    public function getSiteVisitsChart(Request $request)
    {

        $filter = $request->get('filter', 'Y');

        switch ($filter) {
            case 'Y':
                $currentJalaliYear = Verta::now()->year;
                $startYear = $currentJalaliYear - 4;
                $years = range($startYear, $currentJalaliYear);

                $labels = collect($years)->map(fn($y) => (string)$y);
                $totals = $labels->map(function ($jy) {
                    [$gy1, $gm1, $gd1] = Verta::jalaliToGregorian((int)$jy, 1, 1);
                    [$gy2, $gm2, $gd2] = Verta::jalaliToGregorian((int)$jy + 1, 1, 1);
                    $start = Carbon::create($gy1, $gm1, $gd1)->startOfDay();
                    $end = Carbon::create($gy2, $gm2, $gd2)->startOfDay()->subSecond();
                    return SiteVisit::whereBetween('created_at', [$start, $end])->count();
                });

                break;

            case 'M':
                $currentJalaliYear = Verta::now()->year;
                $monthsFa = [
                    1 => 'فروردین', 2 => 'اردیبهشت', 3 => 'خرداد',
                    4 => 'تیر', 5 => 'مرداد', 6 => 'شهریور',
                    7 => 'مهر', 8 => 'آبان', 9 => 'آذر',
                    10 => 'دی', 11 => 'بهمن', 12 => 'اسفند',
                ];

                $labels = collect(range(1, 12))->map(fn($m) => $monthsFa[$m]);
                $totals = collect(range(1, 12))->map(function ($jm) use ($currentJalaliYear) {
                    [$gy1, $gm1, $gd1] = Verta::jalaliToGregorian($currentJalaliYear, $jm, 1);
                    if ($jm < 12) {
                        [$gy2, $gm2, $gd2] = Verta::jalaliToGregorian($currentJalaliYear, $jm + 1, 1);
                    } else {
                        [$gy2, $gm2, $gd2] = Verta::jalaliToGregorian($currentJalaliYear + 1, 1, 1);
                    }
                    $start = Carbon::create($gy1, $gm1, $gd1)->startOfDay();
                    $end = Carbon::create($gy2, $gm2, $gd2)->startOfDay()->subSecond();
                    return SiteVisit::whereBetween('created_at', [$start, $end])->count();
                });
                break;

            case 'W':
                $startWeek = Verta::now()->startWeek();
                $endWeek = Verta::now();
                $daysFa = ['شنبه', 'یکشنبه', 'دوشنبه', 'سه‌شنبه', 'چهارشنبه', 'پنجشنبه', 'جمعه'];

                $labels = collect($daysFa)->slice(0, $endWeek->dayOfWeek + 1);
                $totals = collect(range(0, $endWeek->dayOfWeek))->map(function ($i) use ($startWeek) {
                    $dayStart = $startWeek->copy()->addDays($i)->toCarbon()->startOfDay();
                    $dayEnd = $startWeek->copy()->addDays($i)->toCarbon()->endOfDay();
                    return SiteVisit::whereBetween('created_at', [$dayStart, $dayEnd])->count();
                });
                break;

            case 'T':
                $labels = collect(range(0, 23))->map(fn($h) => $h . ':00');
                $totals = collect(range(0, 23))->map(function ($h) {
                    return SiteVisit::whereDate('created_at', today())
                        ->whereHour('created_at', $h)
                        ->count();
                });
                break;

            default:
                $labels = collect();
                $totals = collect();
        }

        return response()->json([
            'labels' => $labels->values(),
            'totals' => $totals->values(),
        ]);
    }
}

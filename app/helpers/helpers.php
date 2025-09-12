<?php


use App\Models\Admin;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\SiteVisit;
use App\Models\User;
use Carbon\Carbon;

if (!function_exists('backWithError')) {
    function backWithError(string $message): string
    {
        return back()->withErrors(["general" => $message]);
    }
}


if (!function_exists('getNewsCategories')) {
    function getNewsCategories(): array
    {
        $newsCategories = NewsCategory::get();
        return $newsCategories->toArray();
    }
}


if (!function_exists('getAuthenticatedUserFullName')) {
    function getAuthenticatedUserFullName(string $guard = 'web'): string
    {
        $authenticatedUser = auth($guard)->user();
        return $authenticatedUser->first_name . " " . $authenticatedUser->last_name;
    }
}


if (!function_exists('getFullName')) {
    function getFullName(int $userId = null, int $adminId = null): string
    {
        $info = [];

        if ($userId) {
            $info = User::query()
                ->where('id', $userId)
                ->first();
        } else {
            $info = Admin::query()
                ->where('id', $adminId)
                ->first();
        }

        return $info->first_name . " " . $info->last_name;
    }
}


if (!function_exists('getUserFullAvatar')) {
    function getUserFullAvatar(int $userId = null, int $adminId = null): string
    {
        $info = [];

        if ($userId) {
            $info = User::query()
                ->where('id', $userId)
                ->with('file')
                ->first();

            return env("APP_URL") . '/blogs/' . $info->file?->path;
        }

        $info = Admin::query()
            ->where('id', $adminId)
            ->with('file')
            ->first();

        return env("APP_URL") . '/blogs/' . $info->file?->path;
    }
}


if (!function_exists('getShamsiDate')) {
    function getShamsiDate(Carbon $created_at): string
    {
        return $created_at->toJalali()->format('H:i Y/m/d');
    }
}

if (!function_exists('generatePersianCaptcha')) {
    function generatePersianCaptcha(): string
    {
        $persianNumbers = ["0", '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $length = random_int(6, 8);

        $captcha = '';
        for ($i = 0; $i < $length; $i++) {
            $captcha .= $persianNumbers[random_int(0, 9)];
        }

        return $captcha;
    }
}

if (!function_exists('getSiteVisitsQty')) {
    function getSiteVisitsQty(): string
    {
        return SiteVisit::count();
    }
}

if (!function_exists('getAuthorsQty')) {
    function getAuthorsQty(): string
    {
        return
            Admin::query()
                ->where('role_id', 2)
                ->count();
    }
}

if (!function_exists('getNewsQty')) {
    function getNewsQty(): string
    {
        return News::count();
    }
}


<?php


use App\Models\Admin;
use App\Models\NewsCategory;
use App\Models\User;

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
    function getUserFullAvatar(string $userId): string
    {
        $user = User::query()
            ->where('id', $userId)
            ->with('file')
            ->first();

        return env('APP_URL') . '/blogs/' . $user->file?->path;
    }
}


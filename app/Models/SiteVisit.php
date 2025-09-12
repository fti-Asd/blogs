<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class SiteVisit
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $ip_address
 * @property string|null $user_agent
 * @property string $url
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User|null $user
 *
 * @package App\Models
 */
class SiteVisit extends Model
{
    protected $table = 'site_visits';
    public static $snakeAttributes = false;

    protected $casts = [
        'user_id' => 'int'
    ];

    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    #[Scope]
    protected function checkIfExists(Builder $query): void
    {
        $query
            ->where('url', request()->fullUrl())
            ->where(function ($query) {
                if (Auth::check()) {
                    $query->where('user_id', Auth::id());
                } else {
                    $query->where('ip_address', request()->ip());
                }
            })
            ->where('created_at', '>=', now()->subHours(6))
            ->exists();
    }
}

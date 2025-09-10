<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SiteVisit
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string $ip_address
 * @property string|null $user_agent
 * @property string $url
 * @property Carbon $created_at
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class SiteVisit extends Model
{
	protected $table = 'site_visits';
	public $timestamps = false;
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
}

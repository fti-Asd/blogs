<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $national_code
 * @property int $gender
 * @property string $mobile
 * @property string $email
 * @property int|null $avatar_file_id
 * @property string $username
 * @property string $password
 * @property int|null $state_id
 * @property int|null $city_id
 * @property int|null $military_service_status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * @property int $status
 *
 * @property File|null $file
 * @property State|null $state
 * @property City|null $city
 * @property Collection|Comment[] $comments
 * @property Collection|SiteVisit[] $siteVisits
 * @property Collection|News[] $news
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use SoftDeletes;
	protected $table = 'users';
	public static $snakeAttributes = false;

	protected $casts = [
		'gender' => 'int',
		'avatar_file_id' => 'int',
		'state_id' => 'int',
		'city_id' => 'int',
		'military_service_status' => 'int',
		'status' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'national_code',
		'gender',
		'mobile',
		'email',
		'avatar_file_id',
		'username',
		'password',
		'state_id',
		'city_id',
		'military_service_status',
		'status'
	];

	public function file()
	{
		return $this->belongsTo(File::class, 'avatar_file_id');
	}

	public function state()
	{
		return $this->belongsTo(State::class);
	}

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function siteVisits()
	{
		return $this->hasMany(SiteVisit::class);
	}

	public function news()
	{
		return $this->belongsToMany(News::class, 'user_news_likes')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}

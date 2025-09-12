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
 * Class Admin
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $national_code
 * @property int $gender
 * @property string $mobile
 * @property string $email
 * @property int $avatar_file_id
 * @property int $role_id
 * @property string $username
 * @property string $password
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 *
 * @property File $file
 * @property Collection|Log[] $logs
 * @property Collection|News[] $news
 *
 * @package App\Models
 */
class Admin extends Authenticatable
{
	use SoftDeletes;
	protected $table = 'admins';
	public static $snakeAttributes = false;

	protected $casts = [
		'gender' => 'int',
		'avatar_file_id' => 'int',
		'role_id' => 'int',
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
		'role_id',
		'username',
		'password',
		'status'
	];

	public function file()
	{
		return $this->belongsTo(File::class, 'avatar_file_id');
	}

	public function logs()
	{
		return $this->hasMany(Log::class);
	}

	public function news()
	{
		return $this->hasMany(News::class);
	}
}

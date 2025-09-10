<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class File
 * 
 * @property int $id
 * @property string $name
 * @property string $path
 * @property string $extension
 * @property int $size
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property Collection|Admin[] $admins
 * @property Collection|NewsImage[] $newsImages
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class File extends Model
{
	use SoftDeletes;
	protected $table = 'files';
	public static $snakeAttributes = false;

	protected $casts = [
		'size' => 'int'
	];

	protected $fillable = [
		'name',
		'path',
		'extension',
		'size'
	];

	public function admins()
	{
		return $this->hasMany(Admin::class, 'avatar_file_id');
	}

	public function newsImages()
	{
		return $this->hasMany(NewsImage::class);
	}

	public function users()
	{
		return $this->hasMany(User::class, 'avatar_file_id');
	}
}

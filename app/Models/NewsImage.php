<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class NewsImage
 * 
 * @property int $id
 * @property int $news_id
 * @property int $file_id
 * @property int $is_default
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property File $file
 * @property News $news
 *
 * @package App\Models
 */
class NewsImage extends Model
{
	use SoftDeletes;
	protected $table = 'news_images';
	public static $snakeAttributes = false;

	protected $casts = [
		'news_id' => 'int',
		'file_id' => 'int',
		'is_default' => 'int'
	];

	protected $fillable = [
		'news_id',
		'file_id',
		'is_default'
	];

	public function file()
	{
		return $this->belongsTo(File::class);
	}

	public function news()
	{
		return $this->belongsTo(News::class);
	}
}

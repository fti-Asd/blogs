<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Log
 * 
 * @property int $id
 * @property int $admin_id
 * @property int $news_id
 * @property int $operation_status
 * @property Carbon $created_at
 * 
 * @property News $news
 * @property Admin $admin
 *
 * @package App\Models
 */
class Log extends Model
{
	protected $table = 'logs';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'admin_id' => 'int',
		'news_id' => 'int',
		'operation_status' => 'int'
	];

	protected $fillable = [
		'admin_id',
		'news_id',
		'operation_status'
	];

	public function news()
	{
		return $this->belongsTo(News::class);
	}

	public function admin()
	{
		return $this->belongsTo(Admin::class);
	}
}

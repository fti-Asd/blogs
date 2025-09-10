<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AdminLevel
 * 
 * @property int $id
 * @property string $level_name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $deleted_at
 *
 * @package App\Models
 */
class AdminLevel extends Model
{
	use SoftDeletes;
	protected $table = 'admin_levels';
	public static $snakeAttributes = false;

	protected $fillable = [
		'level_name'
	];
}

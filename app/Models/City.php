<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * 
 * @property int $id
 * @property string $name
 * @property int $state_id
 * 
 * @property State $state
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class City extends Model
{
	protected $table = 'cities';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $casts = [
		'state_id' => 'int'
	];

	protected $fillable = [
		'name',
		'state_id'
	];

	public function state()
	{
		return $this->belongsTo(State::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}

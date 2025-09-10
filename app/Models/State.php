<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class State
 * 
 * @property int $id
 * @property string $name
 * 
 * @property Collection|City[] $cities
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class State extends Model
{
	protected $table = 'states';
	public $timestamps = false;
	public static $snakeAttributes = false;

	protected $fillable = [
		'name'
	];

	public function cities()
	{
		return $this->hasMany(City::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class News
 *
 * @property int $id
 * @property string $title
 * @property string $abstract
 * @property string $description
 * @property int $like_qty
 * @property int $news_category_id
 * @property int $admin_id
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $deleted_at
 *
 * @property NewsCategory $newsCategory
 * @property Admin $admin
 * @property Collection|Comment[] $comments
 * @property Collection|Log[] $logs
 * @property Collection|NewsImage[] $newsImages
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class News extends Model
{
	use SoftDeletes;
	protected $table = 'news';
	public static $snakeAttributes = false;

	protected $casts = [
		'like_qty' => 'int',
		'news_category_id' => 'int',
		'admin_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'title',
		'abstract',
		'description',
		'like_qty',
		'news_category_id',
		'admin_id',
		'status'
	];

	public function newsCategory()
	{
		return $this->belongsTo(NewsCategory::class);
	}

	public function admin()
	{
		return $this->belongsTo(Admin::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function logs()
	{
		return $this->hasMany(Log::class);
	}

	public function newsImages()
	{
		return $this->hasMany(NewsImage::class);
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_news_likes')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

    #[Scope]
    protected function applySearch(Builder $query): void
    {
        $keyword = request()->query('search');

        $query
            ->when(request()->has('search'), function (Builder $query) use ($keyword) {
                $query->whereAny(['title', 'abstract', 'description'], 'LIKE', "%$keyword%");
            });
    }

    #[Scope]
    protected function filterByCategoryId(Builder $query): void
    {
        $categoryId = request()->query('category_id');

        if ($categoryId != "all" && $categoryId != "") {
            $query
                ->when(request()->has('category_id'), function (Builder $query) {
                    $query->where('news_category_id', request()->query('category_id'));
                });
        }
    }

    #[Scope]
    protected function applySort(Builder $query): void
    {
        $query
            ->when(request()->has('sort'), function (Builder $query) {
                switch (request()->query('sort')) {
                    case "oldest":
                        $query->orderBy('created_at');
                        break;

                    case "most_visited":
                        $query->orderBy('created_at');
                        break;

                    case "most_popular":
                        $query->orderBy('created_at');
                        break;

                    default:
                        $query->orderByDesc('created_at');
                        break;
                };
            })
            ->unless(request()->has('sort'), function (Builder $query) {
                $query->orderByDesc('created_at');
            });
    }
}

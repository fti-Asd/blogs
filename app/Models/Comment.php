<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Enums\CommentStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comment
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $admin_id
 * @property int $news_id
 * @property int|null $comment_id
 * @property string $name
 * @property string $email
 * @property string $comment_text
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $deleted_at
 *
 * @property News $news
 * @property User|null $user
 * @property Comment|null $comment
 * @property Admin|null $admin
 * @property Collection|Comment[] $comments
 *
 * @package App\Models
 */
class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'comments';
    public static $snakeAttributes = false;

    protected $casts = [
        'user_id' => 'int',
        'admin_id' => 'int',
        'news_id' => 'int',
        'comment_id' => 'int',
        'status' => 'int'
    ];

    protected $fillable = [
        'user_id',
        'admin_id',
        'news_id',
        'comment_id',
        'name',
        'email',
        'comment_text',
        'status'
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    #[Scope]
    protected function getReplyCommentData(Builder $query): void
    {
        $query
            ->with([
                'user',
                'admin',
                'comments' => function ($query) {
                    $query
                        ->whereNotNull('comment_id')
                        ->where('status', CommentStatus::ACCEPTED)
                        ->getReplyCommentData();
                }
            ]);
    }
}

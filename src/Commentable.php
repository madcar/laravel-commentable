<?php

namespace Orkhanahmadov\LaravelCommentable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Orkhanahmadov\LaravelCommentable\Models\Comment;

trait Commentable
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function comment(string $comment): Comment
    {
        return $this->newComment(['comment' => $comment]);
    }

    public function commentAs(Model $user, string $comment): Comment
    {
        return $this->newComment([
            'comment' => $comment,
            'user_id' => $user->getKey(),
        ]);
    }

    private function newComment(array $data)
    {
        return $this->comments()->create($data);
    }
}

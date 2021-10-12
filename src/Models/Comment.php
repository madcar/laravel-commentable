<?php

namespace Orkhanahmadov\LaravelCommentable\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'comment',
    ];

    protected $casts = [
        'created_at' => 'datetime:m-d-y'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * Comment constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('commentable.table_name'));
    }
}

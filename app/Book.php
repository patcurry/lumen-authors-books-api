<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * Get the author that this book belongs to
     */
    public function author()
    {
        return $this->belongsTo('\App\Author');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected$ fillable = [
        'book_title', 'author_id' 
    ];

    /**
     * The attributes that are excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}

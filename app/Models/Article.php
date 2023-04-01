<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{


    use HasFactory;

    protected $with = ['category'];

public function hashtags()
{
    return $this->belongsToMany(Hashtag::class);
}
    public function category()
    {
        return $this->belongsTo(ArtCategory::class);
    }
    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, fn($query, $search) => $query->where(fn($query) => $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%')
        )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) => $query->whereHas('category', fn($query) => $query->where('slug', $category)
        )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) => $query->whereHas('author', fn($query) => $query->where('username', $author)
        )
        );

        $query->when($filters['hashtag'] ?? false, function ($query, $hashtag) {
            $query->whereHas('hashtags', function ($query) use ($hashtag) {
                $query->where('name', $hashtag);
            });
        });
    }
}

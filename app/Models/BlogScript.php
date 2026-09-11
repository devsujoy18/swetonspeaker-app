<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogScript extends Model
{
    public const PageTypeBlog = 'blog';

    public const PageTypeEvent = 'event';

    public const PositionHeader = 'header';

    public const PositionFooter = 'footer';

    protected $fillable = [
        'blog_id',
        'page_type',
        'position',
        'script',
        'is_active',
    ];

    protected $attributes = [
        'position' => self::PositionHeader,
        'is_active' => true,
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeForPageType(Builder $query, string $pageType): Builder
    {
        return $query->where('page_type', $pageType);
    }

    public function scopeForBlog(Builder $query, Blog $blog): Builder
    {
        return $query->whereBelongsTo($blog);
    }
}

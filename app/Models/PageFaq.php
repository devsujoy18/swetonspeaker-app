<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class PageFaq extends Model
{
    public const TypeMainSite = 'main_site';

    public const TypeShopSite = 'shop_site';

    public const PageTypePage = 'page';

    public const PageTypeCategory = 'category';

    public const PageTypeProduct = 'product';

    public const PageTypeBlog = 'blog';

    public const PageTypeEvent = 'event';

    protected $fillable = [
        'type',
        'page_type',
        'route_name',
        'path',
        'entity_type',
        'entity_id',
        'slug',
        'title',
        'description',
        'order_no',
        'is_active',
    ];

    protected $attributes = [
        'type' => self::TypeMainSite,
        'page_type' => self::PageTypePage,
        'order_no' => 0,
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

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeForType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }

    public function scopeForPageType(Builder $query, string $pageType): Builder
    {
        return $query->where('page_type', $pageType);
    }

    public function scopeForRoute(Builder $query, string $routeName): Builder
    {
        return $query->where('route_name', $routeName);
    }

    public function scopeForPath(Builder $query, string $path): Builder
    {
        return $query->where('path', $path);
    }

    public function scopeForSlug(Builder $query, string $slug): Builder
    {
        return $query->where('slug', $slug);
    }

    public function scopeForEntity(Builder $query, string $entityType, int $entityId): Builder
    {
        return $query
            ->where('entity_type', $entityType)
            ->where('entity_id', $entityId);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order_no')->orderBy('id');
    }
}

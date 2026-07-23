<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Keyfeature;
use App\Models\Product;
use App\Models\Productcombination;
use App\Models\Productimage;
use App\Models\Productkeyfeature;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerHomeCacheInvalidation();
    }

    private function registerHomeCacheInvalidation(): void
    {
        foreach ($this->homeCacheModels() as $modelClass) {
            $modelClass::saved(function (Model $model): void {
                $this->forgetHomeCache();
            });

            $modelClass::deleted(function (Model $model): void {
                $this->forgetHomeCache();
            });
        }
    }

    /**
     * @return array<int, class-string<Model>>
     */
    private function homeCacheModels(): array
    {
        return [
            Blog::class,
            Category::class,
            Keyfeature::class,
            Product::class,
            Productcombination::class,
            Productimage::class,
            Productkeyfeature::class,
            Tag::class,
        ];
    }

    private function forgetHomeCache(): void
    {
        foreach ($this->homeCacheKeys() as $cacheKey) {
            Cache::forget($cacheKey);
        }
    }

    /**
     * @return array<int, string>
     */
    private function homeCacheKeys(): array
    {
        return [
            'home.blogs',
            'home.featured-categories.1',
            'home.featured-categories.2',
            'home.featured-products',
            'home.tags.1',
            'home.tags.2',
        ];
    }
}

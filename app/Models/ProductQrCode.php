<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class ProductQrCode extends Model
{
    public const SourceCarton = 'carton';

    public const SourceCounter = 'counter';

    public const SourceCat = 'cat';

    protected $fillable = [
        'source',
        'url',
    ];

    protected static function booted(): void
    {
        static::creating(function (ProductQrCode $productQrCode): void {
            $productQrCode->public_token ??= (string) Str::ulid();
        });
    }

    public static function sources(): array
    {
        return [
            self::SourceCarton,
            self::SourceCounter,
            self::SourceCat,
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'public_token';
    }

    public function ensurePublicToken(): void
    {
        if ($this->public_token === null) {
            $this->public_token = (string) Str::ulid();
            $this->save();
        }
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scans(): HasMany
    {
        return $this->hasMany(QrCodeScan::class);
    }
}

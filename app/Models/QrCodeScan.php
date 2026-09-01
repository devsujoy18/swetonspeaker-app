<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class QrCodeScan extends Model
{
    protected $fillable = [
        'product_qr_code_id',
        'product_id',
        'source',
        'ip_address',
        'device',
        'user_agent',
        'latitude',
        'longitude',
        'location_accuracy',
    ];

    protected static function booted(): void
    {
        static::creating(function (QrCodeScan $qrCodeScan): void {
            $qrCodeScan->scan_token ??= (string) Str::ulid();
        });
    }

    public function getRouteKeyName(): string
    {
        return 'scan_token';
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function qrCode(): BelongsTo
    {
        return $this->belongsTo(ProductQrCode::class, 'product_qr_code_id');
    }
}

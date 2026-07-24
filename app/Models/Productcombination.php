<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productcombination extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function displayName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes): string => self::formatCombinationName((string) ($attributes['name'] ?? '')),
        );
    }

    public static function formatCombinationName(?string $name): string
    {
        $ohm = "\u{03A9}";
        $normalized = str_replace([
            "\u{00CE}\u{00A9}",
            "\u{00C3}\u{017D}\u{00C2}\u{00A9}",
            "\u{00E2}\u{201E}\u{00A6}",
            "\u{00C3}\u{00A2}\u{00E2}\u{20AC}\u{017E}\u{00C2}\u{00A6}",
            "\u{2126}",
        ], $ohm, (string) $name);

        return trim(preg_replace('/\s*'.preg_quote($ohm, '/').'/u', ' '.$ohm, $normalized) ?? $normalized);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productkeyfeatures()
    {
        return $this->hasMany(Productkeyfeature::class);
    }

    public function productmountinginfos()
    {
        return $this->hasMany(Productmountinginfo::class);
    }

    public function productspecifications()
    {
        return $this->hasMany(Productspecification::class);
    }

    public function producttsparameters()
    {
        return $this->hasMany(Producttsparameter::class);
    }

    public function productreconkits()
    {
        return $this->hasMany(Productreconkit::class);
    }
}

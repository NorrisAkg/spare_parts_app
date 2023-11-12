<?php

namespace App\Core\SpareParts;

use App\Core\Pictures\Picture;
use App\Core\Categories\Category;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\SparePartFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SparePart extends Model {
    use HasFactory;

    protected static function newFactory()
    {
        return SparePartFactory::new();
    }

    protected $fillable = [
        'reference',
        'designation',
        'price',
        'brand',
        'description',
    ];

    const MAX_PICTURES = 5;

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function pictures(): HasMany {
        return $this->hasMany(Picture::class);
    }
}

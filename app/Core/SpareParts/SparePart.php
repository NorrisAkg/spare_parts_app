<?php

namespace App\Core\SpareParts;

use App\Core\Categories\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SparePart extends Model {
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
}
